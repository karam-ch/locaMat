@include('head')
<h2>Add a device</h2>
<form method="POST" enctype="multipart/form-data">
    @csrf
    <label>
        Name
        <input type="text" name="name">
    </label>

    <label>
        Type
        <input list="type" name="type">
        <datalist id="type">
            <option value="TEL">
            <option value="TAB">
            <option value="PC">
        </datalist>
    </label>

    <label>
        Reference
        <input list="reference" name="reference">
        <datalist id="reference">
            <option value="AN">
            <option value="AP">
            <option value="XX">
        </datalist>
    </label>

    <label>
        Version
        <input type="text" name="version">
    </label>

    <label>
        Num tel
        <input type="text" name="tel">
    </label>

    <label>
        Add photo
        <input type="file" name="image" accept="image/png, image/jpeg">
    </label>

    <input type="submit" value="Create the device">

    <a href="/home">Back</a>
</form>
@include('footer')
