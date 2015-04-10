
<script type="text/javascript">
  $(document).ready(function() {
 var names = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  limit: 10,

    remote: {

    url: '/scripts/php/customer_names.php?name=%QUERY',

    filter: function(list) {
      return $.map(list, function(name) { return { name: name }; });
    }
  }


});
 

names.initialize();
 
$('.typeahead').typeahead(null, {
  name: 'inputName',
  displayKey: 'name',

  source: names.ttAdapter()
});
})

</script>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Point of Sale</h1>
  <h2>Please Select a Customer</h2>

 <form class="form-inline" action="?action=create_invoice" method="post">

    <div class="form-group">
        <input type="text" class="form-control typeahead" id="inputName" name="inputName" placeholder="Name">
    </div>

    <div class="form-group">
    <button type="submit" class="btn btn-success">Start Sale</button>
    </div>
</form>

</div>

