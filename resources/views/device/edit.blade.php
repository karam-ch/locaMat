@include('head')
<div class='device-edit-container'>
    <h2>Modify the device</h2>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <label>
            Name
            <input type="text" name="name" value="{{ $device->name }}">
        </label>

        <label>
            Type
            <input list="type" name="type" value="{{ $device->type }}">
            <datalist id="type">
                <option value="TEL">
                <option value="TAB">
                <option value="PC">
            </datalist>
        </label>

        <label>
            Reference
            <input list="reference" name="reference" value="{{ $device->ref }}">
            <datalist id="reference">
                <option value="AN">
                <option value="AP">
                <option value="XX">
            </datalist>
        </label>

        <label>
            Version
            <input type="text" name="version" value="{{ $device->version }}">
        </label>

        <label>
            Num tel
            <input type="text" name="tel" value="{{ $device->tel }}">
        </label>

        <label>
            Add photo
            <input type="file" name="image" accept="image/png, image/jpeg">
        </label>

        <input type="submit" value="Modify the device">

        <a href="/device/{{ $device->id }}/show">Back</a>
    </form>
</div>
@include('footer')
