<h1>Buat Tulisan</h1>

<form action="/posts" method="POST">

    @csrf

    <div>
        <label>Judul</label>
        <input type="text" name="title">
    </div>

    <br>

    <div>
        <label>Deskripsi</label>
        <textarea name="description"></textarea>
    </div>

    <br>

    <button type="submit">
        Simpan
    </button>

</form>