function action(id,state){
switch(state){
case 'approved':
    document.getElementById(id).innerHTML ="approved";break;
case "rejected":
    document.getElementById(id).innerHTML ="rejected";break;
case 'waiting':
    document.getElementById(id).innerHTML ="waiting";break;
}
}
