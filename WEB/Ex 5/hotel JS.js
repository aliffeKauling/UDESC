// *********************************** JavaScript Source Code  *************************************** //


// *************************************************************************************************** //
// ************************** Setting up Variables for Setting up Holiday Booking ******************** //
// *************************************************************************************************** //

function variables() {
    var priceMiramarAdult = 50;
    var priceMiramarChild = 25;
    var priceJazminasAdult = 75;
    var priceJazminasChild = 50;
    var priceTropicanaAdult = 100;
    var priceTropicanaChild = 75;

    var extrasBusTour = 60;
    var extrasFlyDrive = 45;
    var extrasBalcony = 30;

    var intAdult = 0;
    var intChild = 0;

    var runningTotal = 0;
    var calculations = 0;
}


// ****************************************************************************************************** //
// ********************************** TOTAL PRICE CALCULATION ******************************************* //
// ****************************************************************************************************** //

function DurationNights() {

    var Nights = 0;
    var intNights = 0;

    //Identifies the element nodes using their ID from the HTML.
    intNights = document.getElementById("Nights").value;

    //Processes the inputs by getting the age from the text box and displaying it on the page.
    Nights = document.createTextNode(intNights);
    document.getElementById("NightsOutput").appendChild(Nights);
}

function PartyDetails() {

    var AdultsParty = 0;
    var intAdultsParty = 0;
    var ChildParty = 0;
    var intChildParty = 0;

    //Identifies the element nodes using their ID from the HTML.
    intChildParty = document.getElementById("ChildParty").value;
    intAdultsParty = document.getElementById("AdultsParty").value;

    //Processes the inputs by getting the age from the text box and displaying it on the page.
    ChildParty = document.createTextNode(intChildParty);
    AdultsParty = document.createTextNode(intAdultsParty);

    document.getElementById("AdultPartyOutput").appendChild(AdultsParty);
    document.getElementById("ChildPartyOutput").appendChild(ChildParty);
}

function Clear() {
    //priceField.removeChild(priceField.childNodes[0]);
    //Works best with lastChild as the price that has been added is identified by javascript.
    //Using the array is good targetting but there are two nodes, there seems to be a space added
    //and this makes it difficult to specify the array/collection index.
    //Could loop through the array/collection but the code needs to be simple for intermediate use.

    var DurationField = document.getElementById("NightsOutput");
    DurationField.removeChild(DurationField.lastChild);

    var AdultsPartyField = document.getElementById("AdultPartyOutput");
    AdultsPartyField.removeChild(AdultsPartyField.lastChild);

    var ChildPartyField = document.getElementById("ChildPartyOutput");
    ChildPartyField.removeChild(ChildPartyField.lastChild);
}

function ClearHotel() {

    var strMiramarNameField = document.getElementById("HotelName");
    strMiramarNameField.removeChild(strMiramarNameField.lastChild);

    var strJazminasNameField = document.getElementById("HotelName");
    strJazminasNameField.removeChild(strJazminasNameField.lastChild);

    var strTropicanaNameField = document.getElementById("HotelName");
    strTropicanaNameField.removeChild(strTropicanaNameField.lastChild);
}

function ClearOptions() {
    var strBusTourField = document.getElementById("ExtraAttractionsOutput");
    strBusTourField.removeChild(strBusTourField.lastChild);

    var strFlyDriveField = document.getElementById("ExtraAttractionsOutput");
    strFlyDriveField.removeChild(strFlyDriveField.lastChild);

    var strBalconyField = document.getElementById("ExtraAttractionsOutput");
    strBalconyField.removeChild(strBalconyField.lastChild);
}


// ****************************************************************************************************** //
// *********************************** If Statements for Radio Buttons ********************************** //
// ****************************************************************************************************** //

function testHotelImages() {

    var strMiramarName = " ";
    var strJazminasName = " ";
    var strTropicanaName = " ";

    if (document.getElementById("Miramar").checked) {
        document.getElementById("Hotelplaceholder").setAttribute("src", "images/Hotel1.jpg");
        document.getElementById("InsideHotelplaceholder").setAttribute("src", "images/InsideHotel1.jpg");
        document.getElementById("PricePlaceHolder").setAttribute("src", "images/HotelPriceTags£50.jpg");

        strMiramarName = document.createTextNode("The Miramar Hotel");
        document.getElementById("HotelName").appendChild(strMiramarName);

        document.getElementById('MiramarDetails').style.visibility = 'visible';
        document.getElementById('HotelDetails').style.visibility = 'hidden';
    } else {
        document.getElementById('MiramarDetails').style.visibility = 'hidden';
    }

    if (document.getElementById('Jazminas').checked) {
        document.getElementById("Hotelplaceholder").setAttribute("src", "images/villas.jpg");
        document.getElementById("InsideHotelplaceholder").setAttribute("src", "images/InsideHotel2.jpg");
        document.getElementById("PricePlaceHolder").setAttribute("src", "images/HotelPriceTags75.jpg");

        strJazminasName = document.createTextNode("The Jazminas Hotel");
        document.getElementById("HotelName").appendChild(strJazminasName);

        document.getElementById('JazminasDetails').style.visibility = 'visible';
        document.getElementById('HotelDetails').style.visibility = 'hidden';
    } else {
        document.getElementById('JazminasDetails').style.visibility = 'hidden';
    }

    if (document.getElementById('Tropicana').checked) {
        document.getElementById("Hotelplaceholder").setAttribute("src", "images/Hotel3.jpg");
        document.getElementById("InsideHotelplaceholder").setAttribute("src", "images/InsideHotel3.jpg");
        document.getElementById("PricePlaceHolder").setAttribute("src", "images/HotelPriceTags£100.jpg");

        strTropicanaName = document.createTextNode("The Tropicana Hotel");
        document.getElementById("HotelName").appendChild(strTropicanaName);

        document.getElementById('TropicanaDetails').style.visibility = 'visible';
        document.getElementById('HotelDetails').style.visibility = 'hidden';
    } else {
        document.getElementById('TropicanaDetails').style.visibility = 'hidden';
        return; //Ends If Statment once the right radio button is chosen.        
    }
}


// ********************************************************************************************************** //
// *********************************** If Statements for CheckBoxes ***************************************** //
// ********************************************************************************************************** //

function ExtraInterest() {

    var strBusTour = " ";
    var strFlyDrive = " ";
    var strBalcony = " ";
    var runningTotal = 0;
    var calculations = 0;

    if (document.getElementById('local').checked) {
        document.getElementById('AttractionsPlaceHolder').setAttribute("src", "images/MagicTourBus£60.jpg");

        strBusTour = document.createTextNode("Tours to Local Interest,  ");
        document.getElementById("ExtraAttractionsOutput").appendChild(strBusTour);
        runningTotal = runningTotal + hotel_prices;
    } else {
        document.getElementById("AttractionsPlaceHolder").setAttribute("src", "images/MysteryBoxRed.jpg");
    }


    if (document.getElementById('flyDrive').checked) {
        document.getElementById('AttractionsPlaceHolder2').setAttribute("src", "images/FlyDrive£45.jpg");

        strFlyDrive = document.createTextNode("Fly-Drive,   ");
        document.getElementById("ExtraAttractionsOutput").appendChild(strFlyDrive);
        runningTotal = runningTotal + hotel_prices;
    } else {
        document.getElementById("AttractionsPlaceHolder2").setAttribute("src", "images/MysteryBoxWithoutBackground.jpg");
    }


    if (document.getElementById('balcony').checked) {
        document.getElementById('AttractionsPlaceHolder3').setAttribute("src", "images/Balcony£30.jpg");

        strBalcony = document.createTextNode("Balcony,  ");
        document.getElementById("ExtraAttractionsOutput").appendChild(strBalcony);
        runningTotal = runningTotal + hotel_prices;
    } else {
        document.getElementById("AttractionsPlaceHolder3").setAttribute("src", "images/MysteryBoxRed2.jpg");
    }


    //Output - displays the value of the running total in the output section of the page.
    calculations = document.createTextNode(runningTotal);
    document.getElementById("TotalPrice").appendChild(calculations);
}


//*************************************************************************************** //
//********************Obtains the Inputs from each text box****************************** //
//*************************************************************************************** //

function personaldata() {
    var strNights = ""; /* JavaScript shows with 2 commas that it is a  string*/
    var strAdults = "";
    var strChildren = "";



    //Identifies the Element nodes using their ID from the Html
    strNights = document.getElementById("Nights").value;
}


// ************************************************************************************************************************* //
// *********************************** USING ARRAYS TO CALCULATE HOTEL PRICES ********************************************** //
// ************************************************************************************************************************* //


var hotel_prices = new Array();
hotel_prices["Hotel Miramar"] = 50;
hotel_prices["Las Jazminas"] = 75;
hotel_prices["Tropicana Gardens"] = 100;



// getHotelPrice() finds the price based on the hotel selected.
// Here, we need to take user's the selection from radio button selection
function getHotelPrice() {
    var HotelSizePrice = 0;
    //Get a reference to the form id="getHotelBooking"
    var theForm = document.forms["getHotelBooking"];
    //Get a reference to the cake the user Chooses name=selectedhotel":
    var selectedHotel = theForm.elements["selectedhotel"];
    //Here since there are 3 radio buttons selectedHotel.length = 3
    //We loop through each radio buttons
    for (var i = 0; i < selectedHotel.length; i++) {
        //if the radio button is checked
        if (selectedHotel[i].checked) {
            //we set HotelSizePrice to the value of the selected radio button
            //i.e. if the user choose the Miramar hotel we set it to 50
            //by using the cake_prices array
            //We get the selected Items value
            //For example cake_prices["Round8".value]"
            HotelSizePrice = hotel_prices[selectedHotel[i].value];
            //If we get a match then we break out of this loop
            //No reason to continue if we get a match
            break;
        }
    }
    //We return the cakeSizePrice
    return HotelSizePrice;


    //LocalExtra() finds the Local price based on a check box selection
    function LocalExtra() {
        var LocalPrice = 0;
        //Get a reference to the form id="getOptionsBooking"
        var theForm = document.forms["getOptionsBooking"];
        //Get a reference to the checkbox id="local"
        var includeLocal = theForm.elements["local"];

        //If they checked the box set LocalPrice to 60
        if (includeLocal.checked == true) {
            LocalPrice = 60;
        }
        //finally we return the candlePrice
        return LocalPrice;
    }


    //FlyDriveExtra() finds the FlyDrive price based on a check box selection
    function FlyDriveExtra() {
        var FlyDrivePrice = 0;
        //Get a reference to the form id="getOptionsBooking"
        var theForm = document.forms["getOptionsBooking"];
        //Get a reference to the checkbox id="local"
        var includeFlyDrive = theForm.elements["flyDrive"];

        //If they checked the box set LocalPrice to 60
        if (includeFlyDrive.checked == true) {
            FlyDrivePrice = 45;
        }
        //finally we return the candlePrice
        return FlyDrivePrice;
    }


    //BalconyExtra() finds the Balcony price based on a check box selection
    function BalconyExtra() {
        var BalconyPrice = 0;
        //Get a reference to the form id="getOptionsBooking"
        var theForm = document.forms["getOptionsBooking"];
        //Get a reference to the checkbox id="local"
        var includeBalcony = theForm.elements["balcony"];

        //If they checked the box set LocalPrice to 60
        if (includeBalcony.checked == true) {
            BalconyPrice = 30;
        }
        //finally we return the candlePrice
        return BalconyPrice;
    }


    function getNights() {
        //Assume form with id="theform"
        var theForm = document.forms["FormNights"];
        //Get a reference to the TextBox
        var quantity = theForm.elements["Nights"];
        var duration = 0;
        //If the textbox is not blank
        if (quantity.value != "") {
            duration = parseInt(quantity.value);
        }
        return duration;
    }


    function getAdults() {
        //Assume form with id="theform"
        var theForm = document.forms["Party"];
        //Get a reference to the TextBox
        var quantity = theForm.elements["AdultsParty"];
        var howmany = 0;
        //If the textbox is not blank
        if (quantity.value != "") {
            howmany = parseInt(quantity.value);
        }
        return howmany;
    }



    // *************************************************************************************************************************** //
    // *********************************** CALCULATING ALL THE ELEMENTS TOGETHER ************************************************* //
    // *************************************************************************************************************************** //


    function getTotal() {
        //Here we get the total price by calling our function
        //Each function returns a number so by calling them we add the values they return together
        var HotelPrice = getHotelPrice() + LocalExtra() + FlyDriveExtra() + BalconyExtra() + getNights() + getAdults();


        //display the result
        document.getElementById('TotalCost').innerHTML =
            "Total Price For Hotel £" + HotelPrice; //Non-standard compliant, is innerHTML//                         
    }

}