const data = [
    {name:'menu_name', data:'menu_name'},
    {name:'status', data:'status'},
    {name:'created_by', data:'created_by'},
    {name:'menu_url', data:'menu_url'},
    {name:'description', data:'description'},
    {name:'created_at', data:'created_at'},
    {name:'buttons', data:'buttons'},
];

const callback = {
    id:'#table .input-toggle',
    size:'small',
    on:'<i class="fas fa-check"></i>',
    onstyle : 'success',
    off:'<i class="fas fa-times"></i>',
    offstyle:'danger',
}

$(document).ready(function() {
    Table({table:'#table', data:data, url:'/api/v1/menu/get', callbackButton:callback})
})
