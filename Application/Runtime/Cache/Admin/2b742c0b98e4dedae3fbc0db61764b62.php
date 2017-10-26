<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Charts - Bootstrap Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    
    <link href="/book1/Public/Admin/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/book1/Public/Admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
    <link href="/book1/Public/Admin/css/font-awesome.css" rel="stylesheet" />
    
    <link href="/book1/Public/Admin/css/adminia.css" rel="stylesheet" /> 
    <link href="/book1/Public/Admin/css/adminia-responsive.css" rel="stylesheet" /> 
    
    <link href="/book1/Public/Admin/css/pages/dashboard.css" rel="stylesheet" /> 
    <!-- <link href="/book1/Public/Admin/css/jquery.visualize.css" rel="stylesheet" />  -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
			
    <h1 class="page-title">
        <i class="icon-signal"></i>
        Dashboard					
    </h1>

    <div class="stat-container">
        
        <div class="stat-holder">						
            <div class="stat">							
                <span>564</span>							
                Completed Sales							
            </div> <!-- /stat -->						
        </div> <!-- /stat-holder -->

        <div class="stat-holder">						
            <div class="stat">							
                <span>423</span>							
                Pending Sales							
            </div> <!-- /stat -->						
        </div> <!-- /stat-holder -->

        <div class="stat-holder">						
            <div class="stat">							
                <span>96</span>							
                Returned Sales							
            </div> <!-- /stat -->						
        </div> <!-- /stat-holder -->

        <div class="stat-holder">						
            <div class="stat">							
            <span>2</span>							
            Chargebacks							
            </div> <!-- /stat -->						
        </div> <!-- /stat-holder -->

    </div> <!-- /stat-container -->

    <div class="widget">
        <div class="widget-header">
            <h3>Bar Chart</h3>
        </div> <!-- /widget-header -->
        <div class="widget-content">
            <!-- <div id="bar-chart" class="chart-holder"></div> /donut-chart -->
            <div id="container" class="chart-holder"></div>
        </div> <!-- /widget-content -->
    </div> <!-- /widget -->

    <div class="widget">
        
        <div class="widget-header">
            <h3>Line Chart</h3>
        </div> <!-- /widget-header -->
                                            
        <div class="widget-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div> <!-- /widget-content -->
        
    </div> <!-- /widget -->

    <div class="widget">
        
        <div class="widget-header">
            <h3>Line Chart</h3>
        </div> <!-- /widget-header -->
                                            
        <div class="widget-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div> <!-- /widget-content -->
        
    </div> <!-- /widget -->

    <div class="widget">
        
        <div class="widget-header">
            <h3>Line Chart</h3>
        </div> <!-- /widget-header -->
                                            
        <div class="widget-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div> <!-- /widget-content -->
        
    </div> <!-- /widget -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script src="/book1/Public/Admin/js/jquery-1.7.2.min.js"></script>
    <script src="/book1/Public/Admin/js/excanvas.min.js"></script>
    <script src="/book1/Public/Admin/js/jquery.flot.js"></script>
    <script src="/book1/Public/Admin/js/jquery.flot.pie.js"></script>
    <script src="/book1/Public/Admin/js/jquery.flot.orderBars.js"></script>
    <script src="/book1/Public/Admin/js/jquery.flot.resize.js"></script>


    <script src="/book1/Public/Admin/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: '部门人数统计表'
                },
                subtitle: {
                    text: '数据来源: <a href="http://www.itcast.cn/php">总裁办</a>'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '人数 (个)'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '截至当前: <b>{point.y:.0f} 人</b>'
                },
                series: [{

                    name: 'Population',
                    data: [['总裁办',1],['程序部',2],['管理部',2],['财务部',1],['运营部',1]],
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.0f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                }]
            });
        });
        </script>
    <!-- <script src="/book1/Public/Admin/js/charts/bar.js"></script>
    <script src="/book1/Public/Admin/js/charts/area.js"></script>
    <script src="/book1/Public/Admin/js/charts/line.js"></script>
    <script src="/book1/Public/Admin/js/charts/pie.js"></script> -->
    <script src="/book1/Public/Admin/plugin/charts/js/highcharts.js"></script>
    <script src="/book1/Public/Admin/plugin/charts/js/modules/exporting.js"></script>

  </body>
</html>