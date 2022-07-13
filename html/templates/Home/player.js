
const players = document.querySelectorAll("#playerAudio");
const progress = document.querySelectorAll("#progress");
const playbtns = document.querySelectorAll("#playbtn");

for (let index = 0; index < players.length; index++) {
    const player = players[index];
    const playbtn = playbtns[index];
    const progres = progress[index];

    let playpause = function () {
      if (player.paused) {
        player.play();
      } else {
        player.pause();
      }
    }
    
    playbtn.addEventListener("click", playpause);
    
    player.onplay = function () {
      playbtn.classList.remove("fa-play");
      playbtn.classList.add("fa-pause");
    }
    
    player.onpause = function () {
      playbtn.classList.add("fa-play");
      playbtn.classList.remove("fa-pause");
    }
    
    player.ontimeupdate = function () {
      let ct = player.currentTime;
      current.innerHTML = timeFormat(ct);
    
      let duration = player.duration;
      prog = Math.floor((ct * 100) / duration);
      progres.style.setProperty("--progress", prog + "%");
    }
    
    function timeFormat(ct) {
      minutes = Math.floor(ct / 60);
      seconds = Math.floor(ct % 60);
    
      if (seconds < 10) {
        seconds = "0"+seconds;
      }
    
      return minutes+":"+seconds;
    }
}