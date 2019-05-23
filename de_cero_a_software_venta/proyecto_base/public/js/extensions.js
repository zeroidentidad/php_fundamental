if (!String.prototype.format) {
    String.prototype.format = function () {
        var text = this;

        for (var i = 0; i < arguments.length; i++) {
            text = text.replace("{" + i + "}", arguments[i]);
        }

        return text;
    }
}

if (!String.prototype.render) {
    String.prototype.render = function (obj) {
        var text = this;

        for (var k in obj) {
            text = text.replace("{" + k + "}", obj[k]);
        }

        return text;
    }
}

if (!Number.prototype.format) {
    Number.prototype.format = function (decimals, moneySymbol) {
        decimals = decimals || 0;
        moneySymbol = moneySymbol || false;
        moneySymbol = moneySymbol ? 'USD' : '';

        return moneySymbol + this.toFixed(decimals).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    };
}

if (!Number.prototype.padLeft) {
    Number.prototype.padLeft = function (n) {
        n = n || 0;

        var zeros = '';

        for (var i = 0; i < n; i++) {
            zeros += '0';
        }

        return zeros.substring(0, zeros.length - this.toString().length) + this.toString();
    };
}