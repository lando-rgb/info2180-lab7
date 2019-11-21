window.onload= function (){
    let lookup = document.getElementById("lookup");
    let lookupcities = document.getElementById("lookupcities");
    getCountry(lookup);
    getCities(lookupcities);
};

let getCountry = (lookup) =>{
  
  
  lookup.addEventListener("click", function(){
      var httpRequest = new XMLHttpRequest();
      
      var country= document.getElementById("country").value.toLowerCase();
      
      let url="./world.php?country=" + country.trim() + "&all=false";
      
      httpRequest.open("GET", url, true);
      
      httpRequest.send();
      
      httpRequest.onreadystatechange = function(){
          if (httpRequest.readyState == 4 && httpRequest.status == 200){
              let countryInfo = this.responseText;
              document.getElementById("result").innerHTML = countryInfo;
          }
      }
      
  });

};

let getCities = (lookupcities) =>{
    lookupcities.addEventListener("click", function(){
        var httpRequest = new XMLHttpRequest();
        
        var country= document.getElementById("country").value.toLowerCase();
        
        let url="./world.php?country=" + country.trim() + "&all=true";
        
        httpRequest.open("GET", url, true);
        
        httpRequest.send();
        
        httpRequest.onreadystatechange = function(){
            if (httpRequest.readyState == 4 && httpRequest.status == 200){
                let countryInfo = this.responseText;
                document.getElementById("result").innerHTML = countryInfo;
            }
        };
        
    });
};