var config = {
    map: {
        '*': {
            'AjaxCart': 'Fahim_AjaxShoppingCartUpdate/js/cartValueIncDec',
            'CartQtyUpdate': 'Fahim_AjaxShoppingCartUpdate/js/cartQtyUpdate'
        }
    },
    shim: {
        AjaxCart: {
            deps: ['jquery']
        },
        CartQtyUpdate: {
            deps: ['jquery']
        }
    }
};