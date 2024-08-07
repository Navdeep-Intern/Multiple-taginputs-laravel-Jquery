<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tags</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha512-TToQDr91fBeG4RE5RjMl/tqNAo35hSRR4cbIFasiV2AAMQ6yKXXYhdSdEpUcRE6bqsTiB+FPLPls4ZAFMoK5WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form id="myForm" name="myForm" action="/register" method="post">
                    @csrf 
                    <div class="mt-3">
                        <label for="name" class="form-label">Tags</label>
                        <input type="text" class="form-control" name="tags" placeholder="Enter tags">
                        <!-- <input id="addButton" class="form-control" type="button" value="Add an input" />
                        <input name="search" class="searchInput form-control" maxlength="20" /> -->

                    </div>
                    <div class="mt-3">
                        <input type="submit" class="btn btn-success" value="Add tags">
                    </div>
                </form>
  
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<!-- <script>
$(function() {

// settings for each autocomplete
var autocompleteOptions = {
  minLength: 3,
  source: function(request, response) {
    $.ajax({
      type: "GET",
      url: "getNames.html",
      data: { name: request.term },
      success: function(data) {
        response(data);
      }
    });
  }
};

// dynamically create an input and initialize autocomplete on it
function addInput() {
  var $input = $("<input>", {
    name: "search",
    "class": "searchInput",
    maxlength: "20"
  });
  $input
    .appendTo("form#myForm")
    .focus()
    .autocomplete(autocompleteOptions);
};

// initialize autocomplete on first input
$("input.searchInput").autocomplete(autocompleteOptions);
$("input#addButton").click(addInput);
});
</script> -->