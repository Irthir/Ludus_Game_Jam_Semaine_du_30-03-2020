// apparaitre/disparaitre formulaire connexion
function masquer_conn(text1)
{
  if (document.getElementById('text1').style.display == 'block') {
       document.getElementById('text1').style.display = 'none';
  }
  else {
       document.getElementById('text1').style.display = 'block';
  }

  console.log("le paragraphe disparaît/apparaît");
}

//Idem pour inscription

function masquer_insc(text2)
{
  if (document.getElementById('text2').style.display == 'block') {
       document.getElementById('text2').style.display = 'none';
  }
  else {
       document.getElementById('text2').style.display = 'block';
  }

  console.log("le paragraphe disparaît/apparaît");
}
