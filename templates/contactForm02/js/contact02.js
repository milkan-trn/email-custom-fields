fetch('../wp-content/plugins/email-custom-fields/locations.json?nocache') .then(response => response.json())
.then(data => locationPrint(data));

function locationPrint(dealersConst){
    dealersAndLocations = dealersConst
    const addOption = function(currentOption){
    //Create option tag
    const newOption = document.createElement("option");
    //Add contenc inside tag
    newOption.innerHTML= currentOption;
    return newOption;
    };
    //Target select tag
    const defaultloc = document.querySelector("#location");
    //Create array with locations
    var locationArr =[];
    for (i =0; i<dealersConst.length; i++) {
        
        locationArr.push(dealersConst[i].Location); 
    }
    //Leave only unique locations
    var unique = locationArr.filter(onlyUnique);
   //console.log(unique);
   //Append locations to menu
   if(unique.length > 0){
                for (l =0; l<unique.length; l++) {
                    //console.log(dealersConst[i].Location);
                    defaultloc.append(addOption(unique[l]));
                }
        }
}

//console.log(window.location.href);

function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
  }
  document.querySelector("#location").addEventListener('change', function(){
   let locID =this.value;
    //console.log(locID);

    const addDepartment = function(currentDep, currentEmail){
        //Create option tag
        const newDep = document.createElement("option");
        //Add contenc inside tag
        newDep.innerHTML= currentDep;
        newDep.setAttribute("email", currentEmail);
        return newDep;
        };
            //Target select tag
    const defaultloc = document.querySelector("#departmen");
    defaultloc.innerHTML="";
    const loadDefault = 'Department';
    defaultloc.append(addDepartment(loadDefault));
    for (v =0; v<dealersAndLocations.length; v++) {
        //console.log(dealersConst[i].Location);
        if(dealersAndLocations[v].Location == locID ){
        defaultloc.append(addDepartment(dealersAndLocations[v].Department, dealersAndLocations[v].Email));
    }
    }
    departmentLoad();

  });

  document.querySelector("#departmen").addEventListener('change', departmentLoad);

  function departmentLoad(){ 
    let sendTo = document.querySelector("#cf02_sendTo");
    let depVal =this.options[this.selectedIndex].getAttribute("email");
    sendTo.value = depVal;
    //console.log(depVal);

  }


 // Contact file add - remove

     
//     // ------------  File upload BEGIN ------------
//     document.querySelector(".file__input--file").addEventListener('change',function(event){
//         var files = event.target.files;
//         for (var i = 0; i < files.length; i++) {
//             var file = files[i];
//             document.querySelector("#file__input").insertAdjacentHTML('afterbegin', "<div class='file__value'><div class='file__value--text'>" + file.name + "</div><div class='file__value--remove' data-id='" + file.name + "' ></div></div>").insertAfter('#file__input');
//         }   
//     });
    
//     //Click to remove item
//     document.querySelector("#file__input").addEventListener('click',function(event){
//         let removeFile = event.target;
//         //let checkFileRemoveTag = document.querySelector(".file__value--text").getAttribute('class');
// //console.log(checkFileRemoveTag);
//    if(removeFile.parentElement.getAttribute('class') == 'file__value--text'){
//         removeFile.parentElement.remove();
//      }
//     });
//     // ------------ File upload END ------------ 
    
