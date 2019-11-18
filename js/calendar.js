$(() => {

    var event;

    $.ajax({
        type:"GET", /*Informacja o tym, że dane będą pobierane*/
        url:"getEvents.php", /*Informacja, o tym jaki plik będzie przy tym wykorzystywany*/
        contentType:"application/json; charset=utf-8", /*Informacja o formacie transferu danych*/
        dataType:'json', /*Informacja o formacie transferu danych*/
         
            /*Działania wykonywane w przypadku sukcesu*/
            success: function(json) { /*Funkcja zawiera parametr*/

                for (var i = 0; i < json.length; i++) {
 
                    console.log(document.getElementsByClassName(json[i].date)[0].classList.contains("addEvent"));

                    if (document.getElementsByClassName(json[i].date)[0].classList.contains("addEvent")) {
                        document.getElementsByClassName(json[i].date)[0].innerHTML += " <br/><span class='event'>"+json[i].name + "<br/>" + json[i].place+"</span>";
                        document.getElementsByClassName(json[i].date)[0].style.backgroundColor = json[i].color;
                        document.getElementsByClassName(json[i].date)[0].style.color = "#ffffff";
                        document.getElementsByClassName(json[i].date)[0].style.fontWeight = "bold";
                        document.getElementsByClassName(json[i].date)[0].style.opacity = "0.6";
                    }

                }
    
            },
             
             
            /*Działania wykonywane w przypadku błędu*/
            error: function(error) {
                alert( "error");
                console.log(error);
            }
         
    });
    
    var day;
    var shown = false;

    $("td.addEvent").click(function() {
        if (shown == false) {
            $(".addEventMenu").css("display", "block");
            day = getDay($(this));
            var clickedDay = document.getElementsByTagName("p");
            clickedDay[1].innerHTML += day;
            shown = true;
        }
        
    });

    function getDay (input) {

        return input.clone().children().remove().end().text();
    }

    $("button.addEventBtn").click(function (e) {
        e.preventDefault();

        var year;
        var month = $(".month").val();

        const regex = /[0-9]{4}/gm;
        let m;

        while ((m = regex.exec($(".date").text())) !== null) {
            // This is necessary to avoid infinite loops with zero-width matches
            if (m.index === regex.lastIndex) {
                regex.lastIndex++;
            }
            
            // The result can be accessed through the `m`-variable.
            m.forEach((match, groupIndex) => {
                year = `${match}`;
            });
        }

        var name = $(".eventName").val();
        var description = $(".eventDescription").val();
        var place = $(".eventPlace").val();
        var startHour = $('.eventStartHour').val();
        var endHour = $('.eventEndHour').val();
        var color = $('.eventColor').val();
        var userId = $('input.userId').val();
        if (day < 10) {
            day = "0" + day;
        }
        var date = year + "-" + month + "-" + day;

        $.ajax({
            url: 'addEvent.php',
            data: {'eventName': name, 'eventDescription': description, 'eventPlace': place, 'eventStartHour': startHour, 'eventEndHour': endHour, 'eventColor': color, 'eventDate': date, 'userId': userId},
            type: 'post',
            success: function (data) {
           
            },
            error: function (request, status, error) {
                alert(request, status);
            }
        });
        

    });

    


    $("p.closeEventMenu").click(function () {
        $(".addEventMenu").css("display", "none");
        var clickedDateDay = $("p.clickedDay").text();
        clickedDateDay = clickedDateDay.replace(/\s+$/, '');
        $("p.clickedDay").text(clickedDateDay.substring(0, clickedDateDay.length - 2));
        shown = false;
    });

});

