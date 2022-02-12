function SearchRecord(module,element) {
    var alphanumeric = /^[^-\s]([\b^\w- ])*$/;

    //var alphanumeric = /^[^-\s][a-zA-Z0-9_\s-]+$/;
    var searchText = $(element).val();
    switch (module) {

        case 'supexps':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllSupExpInvoice();
            }
            
            break;

        case 'supnotes':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllSupNotes();
            }
            break;

        case 'sorders':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllSalesOrders();
            }
            break;

        case 'custorders':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllCustOrderInvoice();
            }
            break;

        case 'custnotes':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllCustNotes();
            }
            break;

        case 'assets':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllassets();
            }
            break;

        case 'capitalassets':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllCapitalassets();
            }
            break;

        case 'depreciateassets':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllDepreciateassets();
            }
            break;

        case 'saleassets':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllSaleassets();
            }
            break;
        
        case 'taxsettlements':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllTaxSettlement();
            }
            break;
        
        case 'taxadjustments':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllTaxAdjustment();
            }
            break;

        case 'taxpayments':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllTaxPayment();
            }
            break;

        case 'accountcharts':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllChartAccount();
            }
            break;
        
        case 'vouchers':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllVouchers();
            }
            break;

        case 'items':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllItems();
            }
            break;

        case 'customers':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllCustomers();
            }
            break;

        case 'suppliers':
            if(searchText!=''){
                if(alphanumeric.test(searchText))
                {
                    showResults(module,searchText);
                }
            }else{
                getAllSuppliers();
            }
            break;
        default:
            break;
    }
}



function showResults(module,searchText){

    if(searchText!='')
    {
      $.ajax({
          type:"GET",
          url: "/rupayapay/emp/search/"+module+"/"+searchText,
          dataType: "html",
          success: function (response) {
              $("#paginate_"+module).html(response);
          }
      });
    }
}