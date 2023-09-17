// function editGuru(user_id, name) {
//     console.log(user_id)

//     const myModal = new bootstrap.Modal(document.getElementById('editGuru'))
//     $('name').val(name)
//     myModal.show()
// }

function editKelas(kelas_id, kelas, jurusan) {
    const myModal = new bootstrap.Modal(document.getElementById('editKelas'))
    $('kelas').val(kelas)
    $('jurusan').val(jurusan)
    myModal.show()
}

$("#tambah-siswa").fireModal({
    title: 'Tambah Data Siswa',
    body: $('#tambahSiswa')
});
