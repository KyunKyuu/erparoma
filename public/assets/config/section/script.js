const data = [
    {name:'section_name', data:'section_name'},
    {name:'status', data:'status'},
    {name:'description', data:'description'},
    {name:'created_by', data:'created_by'},
    {name:'created_at', data:'created_at'},
    {name:'buttons', data:'buttons'},
];

const callback = {
    id:'#table .input-toggle',
    size:'mini',
    on:'<i class="fas fa-check"></i>',
    onstyle : 'success',
    off:'<i class="fas fa-times"></i>',
    offstyle:'danger',
}

$(document).ready(function() {
    Table({table:'#table', data:data, url:'/api/v1/section/get', callbackButton:callback})
})
