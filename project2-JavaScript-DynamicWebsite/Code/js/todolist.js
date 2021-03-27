const formEl = document.getElementById('form');
const todoInputEl = document.getElementById('todoInput');
const todoListContainer = document.querySelector('.todo__list');
const clearAllBtn = document.querySelector('.ClearAll');
//FUNCTIONS
function displayTodoDOM(todo){
    const liEl =document.createElement('li');
    liEl.classList.add('bounceIn')
    liEl.innerHTML = `
    <span class="text">${todo}</span>
    <div class="options">
        <span id="edit"><i class="fa fa-edit"></i></span>
        <span id="trash"><i class="fa fa-trash"></i></span>
       
    </div>
    `;
    todoListContainer.appendChild(liEl);
}
//Delete button
function itemToDelete(item){
   if(item.classList.contains('fa-trash') || item.id === 'trash'){
       const todoLiEl = item.closest('li');
     todoLiEl.classList.remove('bounceIn');
     todoLiEl.classList.add('bounceOutDown');

     setTimeout(() => {
         todoLiEl.remove();
     }, 1000);

     deleteDataFromLocalStorage(item);
   }
}
//Edit button
function itemToEdit(item){
    if(item.classList.contains('fa-edit') || item.id === 'edit'){
        const todoLiEl = item.closest('li');
        todoInputEl.value = todoLiEl.textContent.trim();
        todoLiEl.remove();
        editItemFromLocalStorage(item);
    }
}
//local storage
function storeToLocalStorage(todo){
    let todoArr;
    if(localStorage.getItem('todos') === null){
        todoArr = [];
    }else{
        todoArr = JSON.parse(localStorage.getItem('todos'));
    }
    todoArr.push(todo);
    localStorage.setItem('todos', JSON.stringify(todoArr));
}
//this funtion will take from local storage and display it in the HTML page
function displayDataFromLocalStorage(){
    const todoArr = JSON.parse(localStorage.getItem('todos'));
    for (const todo of todoArr){
        displayTodoDOM(todo);
    }
}

//this fumctoim will delete from local storage 
 function deleteDataFromLocalStorage(item){
    const todoArr = JSON.parse(localStorage.getItem('todos'));
    const todoLiEl = item.closest('li');

    const todoItemLeft = todoArr.filter(todo => todoLiEl.textContent.trim() !== todo);
    
    localStorage.setItem('todos', JSON.stringify(todoItemLeft));


}
function editItemFromLocalStorage(item){
    deleteDataFromLocalStorage(item);
}
//clear all localstorage
function clearClick(number){
    localStorage.clear();
    todoListContainer.innerHTML =" "
}

//EVENTS:
//DOMContentLoaded is a build-in event lestiner that acivate whince the page is loaded 
document.addEventListener('DOMContentLoaded', displayDataFromLocalStorage)

todoListContainer.addEventListener('click', (e) => {
    itemToDelete(e.target);
    itemToEdit(e.target);
});



//this to prevent the Add button from submiting when there is no text in the feild
formEl.addEventListener('submit', (e) => {
    e.preventDefault();
    const inputTodo = todoInputEl.value;
    if(!inputTodo){
        alert("please Enter a todo item")
    }
    else{
        displayTodoDOM(inputTodo);
        storeToLocalStorage(inputTodo);
    }
    formEl.reset();
});


//get the day and date and put it in the to do list interface
function getdate(){
    var today = new Date();
			var year = today.getFullYear();
			var mes = today.getMonth() + 1;
			var dia = today.getDate();
			var d = dia + '-' + mes + '-' + year;
			document.getElementById("todaysDate").innerHTML = d;
}
getdate();

function getday(){
    var d, days;
    d = new Date();
    days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
    ];
    let c =days[d.getUTCDay()];
    document.getElementById("todaysDay").innerHTML = c;
}
getday();


//switch theme and font
const theme = document.getElementById("themechange");

theme.addEventListener("change", () => {
  document.body.classList.toggle("bgtheme");
});

const font = document.getElementById("fontchange");

font.addEventListener("change", () => {
  document.body.classList.toggle("fontchange");
});
