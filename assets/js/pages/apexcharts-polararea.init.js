var options={series:[14,23,21,17,15,10,12,17,21],chart:{height:350,type:"polarArea",parentHeightOffset:0},stroke:{colors:["#fff"]},fill:{opacity:.8},colors:["#537AEF","#8c57d1","#963b68","#e68434","#29aa85"],responsive:[{breakpoint:480,options:{chart:{width:200},legend:{position:"bottom"}}}]},chart=new ApexCharts(document.querySelector("#basic_polar_chart"),options),options=(chart.render(),{series:[42,47,52,58,65],chart:{height:380,type:"polarArea",parentHeightOffset:0},labels:["Rose A","Rose B","Rose C","Rose D","Rose E"],fill:{opacity:1},stroke:{width:1,colors:void 0},yaxis:{show:!1},legend:{position:"bottom"},plotOptions:{polarArea:{rings:{strokeWidth:0},spokes:{strokeWidth:0}}},theme:{monochrome:{enabled:!0,shadeTo:"light",shadeIntensity:.6,color:"#6c757d"}}});(chart=new ApexCharts(document.querySelector("#monochrome_polar_chart"),options)).render();