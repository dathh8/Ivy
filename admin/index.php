         
<?php
include "header.php";
include "leftside.php";
?>
        <div class="admin-content-right">
            <div class="admin-content-right-bg">
                <div class="container">
                <canvas id="myChart"></canvas>
                </div>
            </div>
            
         </div>
     </section>
     <section>
     </section>
     
 </body>
 <script src="script.js"></script>
 <script>
    let myChart = document.getElementById('myChart').getContext('2d');
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Nữ', 'Nam', 'Trẻ em', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets:[{
          label:'Doanh thu',
          data:[
            617594,
            181045,
            153060,
            106519,
            105162,
            95072
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Doanh thu theo danh mục',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
 </html>  
                        