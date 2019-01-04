//button event handlers on the search page to determine which botton is pressed

function searchCharacterWindow (event){
  document.getElementById("modal-backdrop").style.display = "block";
  document.getElementById("character-search-modal").style.display = "block";
}

function searchJobWindow (event){
  document.getElementById("modal-backdrop").style.display = "block";
  document.getElementById("job-search-modal").style.display = "block";
}


function searchMetalWindow (event){
  document.getElementById("modal-backdrop").style.display = "block";
  document.getElementById("metal-search-modal").style.display = "block";
}

function searchPowerWindow (event){
  document.getElementById("modal-backdrop").style.display = "block";
  document.getElementById("power-search-modal").style.display = "block";
}


//establish variables
var characterSearch = document.getElementById('searchCharacter');
characterSearch.addEventListener('click', searchCharacterWindow);

var jobSearch = document.getElementById('searchJob');
jobSearch.addEventListener('click', searchJobWindow);

var metalSearch = document.getElementById('searchMetal');
metalSearch.addEventListener('click', searchMetalWindow);

var powerSearch = document.getElementById('searchPower');
powerSearch.addEventListener('click', searchPowerWindow);
