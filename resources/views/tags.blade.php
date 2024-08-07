<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Auto Complete Tags Input</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <div style="margin: 50px;">
        <h1>Laravel Auto Complete Tags Input</h1>
        <form id="tagsForm">
            <label for="tags">Tags:</label>
            <select class="tags" name="tags[]" multiple="multiple" style="width: 50%"></select>
            <br><br>
            <button type="submit">Submit</button>
        </form>
        <div id="tagsResult" style="margin-top: 20px;"></div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.tags').select2({
            tags: true,
            placeholder: 'Select or create tags',
            ajax: {
                url: '/tags',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            createTag: function (params) {
                var term = $.trim(params.term);

                if (term === '') {
                    return null;
                }

                return {
                    id: term,  // Use text as id for new tags
                    text: term,
                    newTag: true
                };
            }
        });

        $('#tagsForm').on('submit', function(e) {
            e.preventDefault();

            let selectedTags = $('.tags').select2('data');  // Get array of selected tag objects
            let newTags = selectedTags.filter(tag => tag.newTag).map(tag => tag.text);  // Filter new tags

            console.log('New Tags:', newTags);  // Log new tags to console

            $.ajax({
                url: '/save-tags',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    tags: newTags  // Send only new tags to the backend
                },
                success: function(response) {
                    if (response.success) {
                        $('#tagsResult').html('<p>' + response.success + '</p>');
                    }
                }
            });
        });
    });
</script>

</body>
</html>
<!--  -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Auto Complete Tags Input</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <div style="margin: 50px;">
        <h1>Laravel Auto Complete Tags Input</h1>
        <form id="tagsForm">
            <label for="tags">Tags:</label>
            <select class="tags" name="tags[]" multiple="multiple" style="width: 50%"></select>
            <br><br>
            <button type="submit">Submit</button>
        </form>
        <div id="tagsResult" style="margin-top: 20px;"></div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.tags').select2({
                tags: true,
                placeholder: 'Select or create tags',
                ajax: {
                    url: '/tags',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true
                    };
                }
            });

            $('#tagsForm').on('submit', function(e) {
                e.preventDefault();

                let selectedTags = $('.tags').val();
                $.ajax({
                    url: '/save-tags',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tags: selectedTags
                    },
                    success: function(response) {
                        if (response.success) {
                            let resultHtml = '<h3>Saved Tags:</h3><ul>';
                            response.tags.forEach(function(tag) {
                                resultHtml += '<li>' + tag.name.join(', ') + ')</li>';
                            });
                            resultHtml += '</ul>';
                            $('#tagsResult').html(resultHtml);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>  -->