<comprobante>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-4">
                    <input id="cliente" class="form-control" type="text" placeholder="Cliente" value="{model.cliente.nombre}">
                </div>
                <div class="col-xs-8">
                    <input class="form-control" type="text" placeholder="Dirección" readonly value="{model.cliente.direccion}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-7">
                    <input id="producto" class="form-control" type="text" placeholder="Nombre del producto"  value="{producto.nombre}">
                </div>
                <div class="col-xs-2">
                    <input id="cantidad" class="form-control" type="text" placeholder="Cantidad" value="{producto.cantidad}">
                </div>
                <div class="col-xs-2">
                    <div class="input-group">
                        <span class="input-group-addon">MXN</span>
                        <input id="precio" class="form-control" type="text" placeholder="Precio" value="{producto.precio}">
                    </div>
                </div>
                <div class="col-xs-1">
                    <button onclick={agregarDetallle} class="btn btn-primary form-control" id="btn-agregar">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
            </div>
            <hr>
            <ul id="facturador-detalle" class="list-group">
                <li each={model.detalle} class="list-group-item">
                    <div class="row">
                        <div class="col-xs-7">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-danger form-control" onclick={retirarDetalle}>
                                    <i class="glyphicon glyphicon-minus"></i>
                                </button>
                            </span>
                                <input class="form-control" type="text" readonly placeholder="Nombre del producto" value="{nombre}">
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <input class="form-control" type="text" readonly placeholder="Cantidad" value="{cantidad}">
                        </div>
                        <div class="col-xs-2">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">$</span>
                                <input class="form-control" type="text" readonly placeholder="Precio" value="{precio.format(2)}">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input class="form-control" type="text" readonly value="{total().format(2)}">
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row text-right">
                        <div class="col-xs-10 text-right">
                            Sub Total
                        </div>
                        <div class="col-xs-2">
                            <b>{model.sub_total.format(2)}</b>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row text-right">
                        <div class="col-xs-10 text-right">
                            IVA (16%)
                        </div>
                        <div class="col-xs-2">
                            <b>{model.iva.format(2)}</b>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row text-right">
                        <div class="col-xs-10 text-right">
                            Total
                        </div>
                        <div class="col-xs-2">
                            <b>{model.total.format(2)}</b>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script>
        var self = this;

        self.model = new Comprobante();
        self.producto = null;

        self.on('mount', function(){
            __clienteAutocomplete();
            __productoAutocomplete();
        })

        agregarDetallle(){
            self.producto.cantidad = parseInt(self.cantidad.value);
            self.producto.precio   = parseFloat(self.precio.value);
            self.model.detalle.push(self.producto);

            self.producto = null;

            self.model.calcular();
            self.update();
        }

        retirarDetalle(e){
            var item = e.item,
                index = self.model.detalle.indexOf(item);

            self.model.detalle.splice(index, 1);

            self.model.calcular();
            self.update();
        }        

        function Comprobante() {
            this.cliente_id;
            this.cliente = {
                nombre: null,
                direccion: null
            };

            this.detalle = [];

            this.sub_total = 0;
            this.iva = 0;
            this.total = 0;

            this.calcular =  function(){
                var total = 0,
                    iva = 0,
                    subTotal = 0;

                this.detalle.forEach(function(x){
                    total += x.total();
                })

                iva = Formulas.calcularIva(total);
                subTotal = Formulas.calcularMontoSinIva(total);

                this.iva = iva;
                this.sub_total = subTotal;
                this.total = total;
            }                        
        }

        function Producto(obj){
            this.id = obj.id;
            this.nombre = obj.nombre;
            this.cantidad = obj.cantidad;
            this.precio = obj.precio;
            this.cantidad = obj.cantidad;
            this.total = function(){
                return this.precio * this.cantidad;
            }
        }

        function __clienteAutocomplete(){
            var cliente = $("#cliente"),
                    options = {
                        url: function(q) {
                            return base_url('cliente/buscar/' + q);
                        },
                        getValue: 'nombre',
                        list: {
                            onClickEvent: function() {
                                var e = cliente.getSelectedItemData();
                                self.model.cliente_id = e.id;
                                self.model.cliente.nombre = e.nombre;
                                self.model.cliente.direccion = e.direccion;

                                self.update();
                            }
                        }
                    };

            cliente.easyAutocomplete(options);
        }

        function __productoAutocomplete(){
            var producto = $("#producto"),
                    options = {
                        url: function(q) {
                            return base_url('producto/buscar/' + q);
                        },
                        getValue: 'nombre',
                        list: {
                            onClickEvent: function() {
                                var e = producto.getSelectedItemData();
                                self.producto = new Producto({
                                    id: e.id,
                                    nombre: e.nombre,
                                    cantidad: 1,
                                    precio: e.precio
                                });

                                self.update();
                            }
                        }
                    };

            producto.easyAutocomplete(options);
        }        
    </script>    
</comprobante>