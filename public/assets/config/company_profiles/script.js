
 const data = [
    {name:'name', data:'name'},
    {name:'bussines_type', data:'bussines_type'},
    {name:'npwp_number', data:'npwp_number'},
    {name:'address_1', data:'address_1'},
    {name:'address_2', data:'address_2'},
    {name:'email', data:'email'},
    {name:'telepon_1', data:'telepon_1'},
    {name:'telepon_2', data:'telepon_2'},
    {name:'fax', data:'fax'},
    {name:'postal_code', data: 'postal_code'},
    {name:'country', data:'country'},
    {name:'province_id', data:'province_id'},
    {name:'regency_id', data:'regency_id'},
    {name:'district_id', data:'district_id'},
    {name:'village_id', data:'village_id'},
    {name:'bank_name', data:'bank_name'},
    {name:'bank_rekening_number', data:'bank_rekening_number'},
    {name:'bank_owner', data:'bank_owner'},
    {name:'photo', data:'photo'},
    {name:'status', data:'status'},
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
    Table({table:'#table', data:data, url:'/api/v1/company_profiles/get', callbackButton:callback})
})
