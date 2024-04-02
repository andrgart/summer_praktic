var addSongBtn = document.getElementById('add_button');
var songFile = document.getElementById('song');
var user_name = document.querySelector('.user_name').innerHTML;

addSongBtn.addEventListener('click', ()=> {
    let song_file = songFile.files;
    // console.log("s");
    // console.log(song_file);
    // console.log('file path: ' + "songs/" + song_file[0].name);
    var song_path ="songs/" + song_file[0].name;
    setMusic(song_path);
})

const setMusic = async function(song_path) {
    // console.log(song_path);
    const response = await fetch("php/addNewSong.php?song_path=" + song_path + "&user_name=" + user_name);
    if (response.ok) { //если запрос удачно выполнился и вернул resultat
        const res = await response.text();
        console.log(res);
    }
}