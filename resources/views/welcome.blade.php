<form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="excel_file">
    <button type="submit">Import Products</button>
</form>
