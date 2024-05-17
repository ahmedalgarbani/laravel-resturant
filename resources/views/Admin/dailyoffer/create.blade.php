@extends('Admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daily Offer Create</h1>
        </div>
        <div class="card card-primary">
            <div class="card-body myTable">
                <form action="{{ route('admin.dailyoffer.store') }}" method="post" autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="search-container">
                        <label> Search for Product </label>
                        <br>
                        <input type="text"class="search" id="searchInput" placeholder="Search...">
                        <div id="searchResults" class="search-results"></div>
                    </div>

                    <input name="product_id" id="product_id" type="hidden">
                    <br>

                        <div class="col-md-6">
                            <label for="inputName" class="control-label">status</label>
                            <select name="status" class="form-control SlectBox">
                                <option value="1">active</option>
                                <option value="0">inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchQuery = $(this).val().toLowerCase();
                if (searchQuery.length > 0) {
                    $.ajax({
                        url: '{{ route('admin.daily-offer.search-product') }}',
                        method: 'GET',
                        data: { search: searchQuery },
                        success: function(response) {
                            displaySearchResults(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    $('#searchResults').empty();
                }
            });

            $(document).on('click', '.search-item', function() {
                var productId = $(this).data('id');
                $('#product_id').val(productId);
            });

            function displaySearchResults(results) {
                var searchResultsContainer = $('#searchResults');
                searchResultsContainer.empty();

                if (results.length > 0) {
                    results.forEach(function(result) {
                        console.log(result.thumb_image)
                        var itemTest = $(`
    <div class="search-item important" data-id="${result.id}">
        <img class="mr-3 rounded" width="50" src="{{ asset('') }}${result.thumb_image.substring(1)}" alt="product">
        ${result.name}
    </div>
`);

                        searchResultsContainer.append(itemTest);
                    });
                } else {
                    searchResultsContainer.html('<div class="search-results-item">No results found</div>');
                }
            }
        });
    </script>
@endpush
