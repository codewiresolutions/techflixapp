

  <script>
    function sidebarToggle() {
      let sidebar = document.getElementById("sidebar");
      sidebar.classList.toggle("active");
      
      document.querySelector(".container_wrapper").classList.toggle("active")
    }
  </script>

  <script>
    Highcharts.getJSON(
      "https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json",
      function (data) {
        Highcharts.chart("container", {
          chart: {
            zoomType: "x",
          },
          title: {
            text: "USD to EUR exchange rate over time",
          },
          subtitle: {
            text:
              document.ontouchstart === undefined
                ? "Click and drag in the plot area to zoom in"
                : "Pinch the chart to zoom in",
          },
          xAxis: {
            type: "datetime",
          },
          yAxis: {
            title: {
              text: "Exchange rate",
            },
          },
          legend: {
            enabled: false,
          },
          plotOptions: {
            area: {
              fillColor: {
                linearGradient: {
                  x1: 0,
                  y1: 0,
                  x2: 0,
                  y2: 1,
                },
                stops: [
                  [0, Highcharts.getOptions().colors[0]],
                  [
                    1,
                    Highcharts.color(Highcharts.getOptions().colors[0])
                      .setOpacity(0)
                      .get("rgba"),
                  ],
                ],
              },
              marker: {
                radius: 2,
              },
              lineWidth: 1,
              states: {
                hover: {
                  lineWidth: 1,
                },
              },
              threshold: null,
            },
          },

          series: [
            {
              type: "area",
              name: "USD to EUR",
              data: data,
            },
          ],
        });
      }
    );
  </script>


<script>



$('.your').slick({
      dots:true,
      infinite: true,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [

  {
      breakpoint: 1190,
      settings: {
        arrows: true,
      
        slidesToShow: 3
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        
        slidesToShow: 2
      }
    },
    {
      breakpoint: 570,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]

});
		
		$('.little_slider').slick({
		  dots:true,
		  infinite: false,
		speed: 300,
		slidesToShow: 2,
		slidesToScroll: 1,
    responsive: [

{
    breakpoint: 1190,
    settings: {
      arrows: true,
    
      slidesToShow: 2
    }
  },
  {
    breakpoint: 768,
    settings: {
      arrows: true,
      
      slidesToShow: 1
    }
  },
  {
    breakpoint: 570,
    settings: {
      arrows: false,
      centerMode: true,
      centerPadding: '40px',
      slidesToShow: 1
    }
  }
]

		
		
		});
	</script>
  <script>
       $(document).ready(function () {
     
     var navListItems = $('div.setup-panel div a'),
         allWells = $('.setup-content'),
         allNextBtn = $('.nextBtn');
     
     allWells.hide();
     
     navListItems.click(function (e) {
         e.preventDefault();
         var $target = $($(this).attr('href')),
             $item = $(this);
     
         if (!$item.hasClass('disabled')) {
             navListItems.removeClass('btn-success').addClass('btn-default');
             $item.addClass('btn-success');
             allWells.hide();
             $target.show();
             $target.find('input:eq(0)').focus();
         }
     });
     
     allNextBtn.click(function () {
         var curStep = $(this).closest(".setup-content"),
             curStepBtn = curStep.attr("id"),
             nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
             curInputs = curStep.find("input[type='text'],input[type='url']"),
             isValid = true;
     
         $(".form-group").removeClass("has-error");
         for (var i = 0; i < curInputs.length; i++) {
             if (!curInputs[i].validity.valid) {
                 isValid = false;
                 $(curInputs[i]).closest(".form-group").addClass("has-error");
             }
         }
     
         if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
     });
     
     $('div.setup-panel div a.btn-success').trigger('click');
     });
  </script>



<script>
// Add active class to the current button (highlight it)

</script>
	<script
		src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"
		></script>
	<script
		src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
		crossorigin="anonymous"
		></script>
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
		integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
		crossorigin="anonymous"
		></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>