let list = document.querySelectorAll(".navigation li");
function activeLink(){
    list.forEach((item)=>
    item.classList.remove("hovered"));
    this.classList.add("hovered");

}

list.forEach((item)=>
item.addEventListener("mouseover",activeLink));


let toggle = document.querySelector(".toggle");
let main = document.querySelector(".main");
let navigation = document.querySelector(".navigation");

toggle.onclick = function(){

    navigation.classList.toggle("active")
    main.classList.toggle("active")


}



addUaer();


function addUaer() {
  var btn = document.querySelector(".btn");
  
  btn && btn.addEventListener('click', function () {
     on();
 });
};
function on() {
  document.querySelector(".overlay").style.display = "block";
  document.querySelector(".addUserCard").style.display = "block";

}
function off() {
    document.querySelector(".overlay").style.display = "none";
    document.querySelector(".addUserCard").style.display = "none";
  
  }



function closeCard() {
    
    document.querySelector(".closeCard").addEventListener('click', function () {
       off();
     
   });
  };

  function redirect (x) { 
  
    window.location.href="/users/" + x;

}







function redirectComp (x) { 
  
    window.location.href="/competitions/"+x;

}

archiveOben();
userOben();

function archiveOben() {
  let btn = document.querySelector(".archiveTabe");
  btn && btn.addEventListener('click', function () {
    onArchive();
 });
};

function userOben() {
  document.querySelector(".userTabe") && 
  document.querySelector(".userTabe").addEventListener('click', function () {
    onUser();
 });
};

function onArchive() {
  document.querySelector(".archiveTable").style.display = "block";
  document.querySelector(".usersTable").style.display = "none";
};

function onUser() {
    document.querySelector(".archiveTable").style.display = "none";
    document.querySelector(".usersTable").style.display = "block";
  };


 
// add user

const textuserName = document.querySelector("#textUserName");
const textAlmasijed = document.querySelector("#textAlmasijed");
const textSupervisor = document.querySelector("#textSupervisor");
const numPassword = document.querySelector("#numPassword");
const textConffer = document.querySelector("#textConffer");

const textPart = document.querySelector("#textPart");
const numDate = document.querySelector("#numDate");
const addtd = document.querySelector(".addtd");

const parantTr = document.querySelector(".parantTr");
const userTable = document.querySelector(".userTable");





addtd.addEventListener('click', function () {
  console.log("hi");
    if(textuserName.value.trim().length == '' && textAlmasijed.value.trim().length == '' 
     && textSupervisor.value.trim().length == '' && numPassword.value.trim().length == ''
     && textConffer.value.trim().length == ''&& textPart.value.trim().length == ''
     && numDate.value.trim().length == '')
      return;

  

      const addUserTable = document.createElement('tr');
      addUserTable.classList.add('hoverEvent');

      parantTr.prepend(addUserTable);
      
      // create td in tabel

      const adduserName = document.createElement('td');
      adduserName.innerText = textuserName.value;

      addUserTable.appendChild(adduserName);

      const addAlmasijed = document.createElement('td');
      addAlmasijed.innerText = textAlmasijed.value;

      addUserTable.appendChild(addAlmasijed);

      const addSupervisor = document.createElement('td');
      addSupervisor.innerText = textSupervisor.value;

      addUserTable.appendChild(addSupervisor);

      const addIcon = document.createElement('td');
      addUserTable.classList.add('deleteUser');
      addUserTable.appendChild(addIcon);

      const addbuttnDelete= document.createElement('button');
      addbuttnDelete.innerText = 'Delete';
      addIcon.appendChild(addbuttnDelete);

      textuserName.value = '' ;
      textAlmasijed.value = '' ;
      textSupervisor.value = '';
      numPassword.value = '';
      textConffer.value = '' ;
      textPart.value = '';
      numDate.value = '';

      closeCard();

});



addUserList = document.querySelector(".check");
addUserListDelete = document.querySelector(".delete");

addUserList.addEventListener('click', function () {
    
    addUserList.remove();
    addUserListDelete.remove();
    changeStatusUser();

});


tableIcon = document.querySelector(".tableIcon");
function changeStatusUser()
{
    
  const addUserTable = document.createElement('tr');
  addUserTable.classList.add('hoverEvent');

  parantTr.prepend(addUserTable);

  const addbuttnDelete= document.createElement('button');
      addbuttnDelete.innerText = 'حذف';
      tableIcon.appendChild(addbuttnDelete);
};







function soundedNew()
{
    

    let soundedN = document.getElementById('addUsersoundedQ').cloneNode(true);

    soundedN.setAttribute('id', '');
    soundedN.classList.add('addUsersounded');

    soundedN.style.display = 'block';

    document.getElementById('sounded-q').appendChild(soundedN);

}