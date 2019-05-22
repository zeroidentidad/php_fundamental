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
                    <input id="producto" class="form-control" type="text" placeholder="Nombre del producto">
                </div>
                <div class="col-xs-2">
                    <input class="form-control" type="text" placeholder="Cantidad">
                </div>
                <div class="col-xs-2">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">USD</span>
                        <input class="form-control" type="text" placeholder="Precio">
                    </div>
                </div>
                <div class="col-xs-1">
                    <button class="btn btn-primary form-control" id="btn-agregar">
                        <i class="glyphicon glyphicon-plus"></i>
                    </button>
                </div>
            </div>
            <hr>
            <ul id="facturador-detalle" class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-7">
                            <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-danger form-control" onclick="facturador.retirar(0);">
                                    <i class="glyphicon glyphicon-minus"></i>
                                </button>
                            </span>
                                <input name="producto" class="form-control" type="text" readonly placeholder="Nombre del producto" value="">
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <input name="cantidad" class="form-control" type="text" readonly placeholder="Cantidad" value="20">
                        </div>
                        <div class="col-xs-2">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">$</span>
                                <input name="precio" class="form-control" type="text" readonly placeholder="Precio" value="20">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input class="form-control" type="text" readonly value="400">
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
                            <b>328.00</b>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row text-right">
                        <div class="col-xs-10 text-right">
                            IVA (18%)
                        </div>
                        <div class="col-xs-2">
                            <b>72.00</b>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row text-right">
                        <div class="col-xs-10 text-right">
                            Total
                        </div>
                        <div class="col-xs-2">
                            <b>400.00</b>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script>
        var self = this;

        self.model = new Comprobante();

        self.on('mount', function(){
            __clienteAutocomplete();
        })

        function Comprobante() {
            this.cliente_id;
            this.cliente = {
                nombre: null,
                direccion: null
            };

            this.sub_total;
            this.iva;
            this.total;
            this.detalle = [];
        }

        function __clienteAutocomplete(){
            var client = $("#cliente"),
                    options = {
                        url: function(q) {
                            return base_url('cliente/buscar/' + q);
                        },
                        getValue: 'nombre',
                        list: {
                            onClickEvent: function() {
                                var e = client.getSelectedItemData();
                                self.model.cliente_id = e.id;
                                self.model.cliente.nombre = e.nombre;
                                self.model.cliente.direccion = e.direccion;

                                self.update();
                            }
                        }
                    };

            client.easyAutocomplete(options);
        }
    </script>    
</comprobante>