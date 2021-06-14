let i = 1;
var allReservation = 0;
var prixReservationArray = [];
var bienIdArray = [];
var bienPensionArray = [];
var bienEnfantarray = [];
function addNew() {
    var el = document.createElement("div");
    var insertAfterForm = document.getElementById('insertAfterForm'+i)
    i++;
    el.innerHTML = `
    <form action="" method="post" style="border: 5px solid #1C6EA4;border-top-style: none;margin-top: -16px;" id="insertAfterForm`+i+`">
    <div class="p-3 m-3">
        <div class="row">
            <div class="col-sm-3">
            <label for="exampleInputEmail1">Type Bien :</label>
                <select id="typebien`+ i + `" name="type` + i + `" class="browser-default custom-select mb-4" onchange="a(` + i + `)">
                    <option value="" disabled="" selected="">Type Bien</option>
                    <option value="Chambre">Chambre</option>
                    <option value="Appart">Appart</option>
                    <option value="Bungalow">Bungalow</option>
                </select>
            </div>
            <div class="col-sm-3" id="classtypechambre`+ i + `" name="classTypeChambre` + i + `">
            </div>
            <div class="col-sm-3" id="typeLit`+ i + `" name="typeLit` + i + `">
            </div>
            <div class="col-sm-3" id="vue`+ i + `" name="vueType` + i + `">
            </div>
        </div>
        <div id="enfant`+ i + `">
                </div>
        <div class="row text-center">
            <div class="col-sm-4">
            <label for="exampleInputEmail1">Type Pension :</label>
                <select id="pension`+ i + `" name="pension` + i + `" class="browser-default custom-select mb-4">
                    <option value="" disabled="" selected="">Type Pension</option>
                    <option value="Sans">Sans</option>
                    <option value="Demi">Demi</option>
                    <option value="Complete">Complete</option>
                </select>
            </div>
        </div>
        <div id="buttonCalcule`+ i + `">
        <center>
                    <a class="btn btn-lg  mb-2" style="background-color: #FB9334;" id="calcule`+ i + `" onclick="check(` + i + `)" >Check</a>
                    </center>
    </div>
    </div>
    </form>`;
    insertAfterForm.insertAdjacentElement('afterend', el);

}
function a(p1) {
    var a = document.getElementById('typebien' + p1).value;

    var tch = document.getElementById('classtypechambre' + p1)
    var kids = document.getElementById('enfant' + p1)
    var tch2 = document.getElementById('typeLit' + p1)
    var vue = document.getElementById('vue' + p1)
    if (a == "Chambre") {
        tch.innerHTML = `<label for="exampleInputEmail1">Type Chambre :</label>
        <select id="typechambre` + p1 + `" class="browser-default custom-select mb-3" name="typechambre` + p1 + `" onchange="a1(` + p1 + `)"> 
        <option value="" disabled="" selected="">Votre Choix:</option>
         <option value="1">Simple</option>
          <option value="0">Double</option>
        </select>
        <br>
       `
        kids.innerHTML = ` <div class="row p-3  "">
       <div class="col-sm-5">
       <label for="exampleInputEmail1">Last Than 2 Years :</label>
           <input type="number"  id="kid` + p1 + `"  placeholder="Kids(<2Ans)" class="browser-default custom-select" name="kid` + p1 + `"  onkeyup="a3(` + p1 + `) ">
            </div>
       <div class="col-sm-5" id="afterKid`+ p1 + `">
        </div>
       </div>


       <div class="row p-3" >
       <div class="col-sm-5">
       <label for="exampleInputEmail1">Between 2 & 14  years :</label>
           <input type="number" id="between2nad14` + p1 + `"  placeholder="Enfants(2<Ans<14)" class="browser-default custom-select" name="enfant` + p1 + `" onkeyup="a4(` + p1 + `)">
       </div>
       
       <div class="col-sm-5" id="afterEnfant`+ p1 + `">
        </div>
       </div>


        <div class="row p-3">
       <div class="col-sm-5">
       <label for="exampleInputEmail1">More Than 14 Years :</label>
           <input type="number" id="young` + p1 + `" placeholder="Enfants(Ans>14)" class="browser-default custom-select" name="young` + p1 + `" onkeyup="a5(` + p1 + `)">
       </div>
      
       <div class="col-sm-5" id="afterYoung`+ p1 + `">
        </div>
       </div>`

    } else {
        tch.innerHTML = ''
        tch2.innerHTML = ''
        vue.innerHTML = ''
        kids.innerHTML = ''
    }
}
function a1(p1) {
    var a1 = document.getElementById('typechambre' + p1).value;
    var tch2 = document.getElementById('typeLit' + p1)
    var vue = document.getElementById('vue' + p1)
    if (a1 == "0") {
        tch2.innerHTML = '<label for="exampleInputEmail1">Type Lit:</label><select class="typelit browser-default custom-select mb-3" id="typelit' + p1 + '" name="typeLit' + p1 + '" class="browser-default custom-select mb-3" onclick="a2(' + p1 + ')"> <option value="" disabled="" selected="">Votre Choix</option> <option value="0">2 lit simple</option> <option value="1">lit double</option> </select> '
    } else {
        vue.innerHTML = ''
        tch2.innerHTML = '<label for="exampleInputEmail1">Type Vue:</label><select class="typevue browser-default custom-select mb-3" id="typeVue' + p1 + '" class="browser-default custom-select mb-3" name="typeVue' + p1 + '"> <option value="" disabled="" selected="">Votre Choix</option> <option value="int">Vue Int</option> <option value="ext">Vue EX</option> </select> ';
    }


}
function a2(p1) {
    var a2 = document.getElementById('typelit' + p1).value;
    var vue = document.getElementById('vue' + p1)

    if (a2 == "0") {
        vue.innerHTML = '<label for="exampleInputEmail1">Type Vue:</label><select id="typeVueDouble' + p1 + '" class="browser-default custom-select mb-2" name="typeVueDouble' + p1 + '"> <option value="" disabled="" selected="">Votre Choix</option> <option value="int">Vue Int</option></select> ';

    } else {
        vue.innerHTML = '<label for="exampleInputEmail1">Type Vue:</label><select id="typeVueDouble' + p1 + '" class="browser-default custom-select mb-2" name="typeVueDouble' + p1 + '"> <option value="" disabled="" selected="">Votre Choix</option> <option value="int">Vue Int</option> <option value="ext">Vue EX</option> </select> ';
    }

}

function a3(p1) {
    var kid = document.getElementsByName('kid' + p1);
    var kidLit = document.getElementsByName('kidLit' + p1);
    if (kidLit.length == 0) {
        var el = document.createElement("div");
        el.id = 'check' + p1;
        el.innerHTML = '<label for="exampleInputEmail1">Option Lit :</label><select  id="kidLit' + p1 + '" class="browser-default custom-select mb-2" name="kidLit' + p1 + '"> <option value="" disabled="" selected="">Votre Choix</option> <option value="1">Plus lit (25%)</option><option value="0">Pas de Lit</option></select>'
        var insertAfter = document.getElementById('afterKid' + p1)
        insertAfter.insertAdjacentElement('afterbegin', el);
    }

    if (!kid[0].value) {
        var d = document.getElementById('check' + p1);
        d.innerHTML = ""
    }

}

function a4(p1) {
    var enfant = document.getElementsByName('enfant' + p1);
    var enfantLit = document.getElementsByName('enfantLit' + p1);
    if (enfantLit.length == 0) {
        var el = document.createElement("div");
        el.id = 'checkEnfant' + p1;
        el.innerHTML = '<label for="exampleInputEmail1">Option Lit :</label><select  id="enfantLit' + p1 + '" class="browser-default custom-select mb-2" name="enfantLit' + p1 + '"> <option value="1" selected="">Plus lit (25%)</option></select>'
        var insertAfter = document.getElementById('afterEnfant' + p1)
        insertAfter.insertAdjacentElement('afterbegin', el);
    }

    if (!enfant[0].value) {
        var d = document.getElementById('checkEnfant' + p1);
        d.innerHTML = ""
    }

}

function a5(p1) {
    var young = document.getElementsByName('young' + p1);
    var youngLit = document.getElementsByName('youngLit' + p1);

    if (youngLit.length == 0) {
        var el = document.createElement("div");
        el.id = 'checkYoung' + p1;
        el.innerHTML = '<label for="exampleInputEmail1">Option Lit :</label><select  id="youngLit' + p1 + '" class="browser-default custom-select mb-2" name="youngLit' + p1 + '"> <option value="" disabled="" selected="">Votre Choix</option> <option value="chmabreSimple">Ajout Chambre Simple</option><option value="plus70">(+70%) et Ajout un Lit </option></select>'
        var insertAfter = document.getElementById('afterYoung' + p1)
        insertAfter.insertAdjacentElement('afterbegin', el);

    }
    if (!young[0].value) {
        var d = document.getElementById('checkYoung' + p1);
        d.innerHTML = ""
    }
}



function check(p1) {
    
    var obj = {};
    var typebien = document.getElementById('typebien' + p1);

    if (typebien.value == "Chambre") {
        var typechambre = document.getElementById('typechambre' + p1);

        if (typechambre.value == "1") {
            var typeVue = document.getElementById('typeVue' + p1);
            obj['typeVue' + p1] = typeVue.value;

        } else if (typechambre.value == "0") {

            var typelit = document.getElementById('typelit' + p1);

            if (typelit.value == "lit simple") {
                var typeVueDouble = "1";
                obj['typeVueDouble' + p1] = typeVueDouble;

            } else {
                var typeVueDouble = document.getElementById('typeVueDouble' + p1);
                obj['typeVueDouble' + p1] = typeVueDouble.value;
            }
            obj['typelit' + p1] = typelit.value;

        }

        obj['typechambre' + p1] = typechambre.value;


    }
    obj['typebien' + p1] = typebien.value;



    $.ajax({
        url: '/projet1/tarifs/check/' + p1,
        type: "POST",
        data: obj,
        dataType: "json",
        cache: false,
        success: function (data) {
            var prix = parseInt(data.prix);
            var nombreEnfant = 0;
            var totalPrix = prix;
            var pension = document.getElementById('pension' + p1).value;
            
            if (pension == "Sans") {
                totalPrix = totalPrix;
            } else if (pension == "Demi") {
                totalPrix = totalPrix + 50;
            } else if (pension == "Complete") {
                totalPrix = totalPrix + 100;
            }

            if (typebien.value == "Chambre") {


                var lessthan2 = document.getElementById('kid' + p1).value;
                
                if (lessthan2.length > 0) {
                    nombreEnfant = nombreEnfant + parseInt(lessthan2);
                    var lessthan2Lit = document.getElementById('kidLit' + p1).value;
                    if (lessthan2Lit == "1") {
                        var nombreKidPrice = lessthan2 * (prix / 4);
                        totalPrix = totalPrix + nombreKidPrice
                    } else if (lessthan2Lit == "0") {
                        totalPrix = totalPrix;
                    }
                }

                var between2and14 = document.getElementById('between2nad14' + p1).value;
                if (between2and14.length > 0) {
                    nombreEnfant = nombreEnfant +parseInt(between2and14);
                        var nombreKidPrice = between2and14 * (prix / 4);
                        totalPrix = totalPrix + nombreKidPrice
                }

                var greaterthan14 = document.getElementById('young' + p1).value;
                if (greaterthan14.length > 0) {
                    nombreEnfant = nombreEnfant +parseInt(greaterthan14);
                    var greaterthan14Lit = document.getElementById('youngLit' + p1).value;
                        if(greaterthan14Lit == "chmabreSimple"){
                            var nombreEnfantPrice = greaterthan14 * 200;
                            totalPrix = totalPrix + nombreEnfantPrice;
                        }else if(greaterthan14Lit == "plus70"){
                            var nombreEnfantPrice = greaterthan14 * (   (prix*70) / 100 );
                            totalPrix = totalPrix + nombreEnfantPrice;
                        }
                }
            }
          
            prixReservationArray.push(totalPrix);
            bienIdArray.push(data.id);
            bienPensionArray.push(pension);
            bienEnfantarray.push(nombreEnfant);

            console.log(prixReservationArray);
            console.log(bienIdArray);
            console.log(bienPensionArray);
            console.log(bienEnfantarray);



            var reservationPrice = document.createElement("div");
            var prixReserve = document.getElementById('prixReserve' + p1);
            if (prixReserve) {
                prixReserve.innerHTML = '';
            }
            reservationPrice.innerHTML = `<center><h3 class="" id="prixReserve` + p1 + `">Prix reservation ` + p1 + ` :  ` + totalPrix + ` DH</h3><center>`
            var buttonCalcule = document.getElementById('buttonCalcule' + p1);
            buttonCalcule.innerHTML = ''
            buttonCalcule.insertAdjacentElement('afterbegin', reservationPrice);
            
            
            allReservation = allReservation + totalPrix;
            var buttonCalcule = document.getElementById('allReservationPrice');
            buttonCalcule.innerHTML = '<h3 class="text-primary text-center"> Prix total : '+allReservation+' DH</h3>'
        }
    });

}

function book(){
    var unid=Math.random();
    var startDate = document.getElementById('startTime').value;
    var endDate = document.getElementById('endTime').value;
    for(j=0; j<i;j++){

        // console.log(bienPensionArray[j]);
        $.ajax({
            url: '/projet1/tarifs/insertReservation/',
            type: "POST",
            data: {
                prix_final: prixReservationArray[j],
                bien_id: bienIdArray[j],
                pension: bienPensionArray[j],
                enfant: bienEnfantarray[j],
                startDate:  startDate,
                endDate: endDate,
                unid: unid,
            },
            dataType: "json",
            cache: false,
            success: function (data) {
                var successReserve = document.getElementById('successReserve');
                successReserve.innerHTML = '';
                successReserve.innerHTML = `
                <center>
                <div class="alert alert-primary p-5 m-5" role="alert">
                Succes Reservation
              </div>
              </center>`;

            }
        });
    
    }
}