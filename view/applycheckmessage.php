<?php
if(!isset($_SESSION)){
    session_id("login");
    session_start();
}
header('content-type:text/html;charset:utf8');
if(empty($_SESSION['username'])&&empty($_SESSION['password'])&&empty($_SESSION['usertype'])){
    echo "<script>alert('禁止非法从地址栏访问!');window.location.href='../view/login.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>动物管理系统</title>
    <meta name="keywords" content="响应式布局、动物管理系统、跨平台、iphone/ipad/mac..." />
    <meta name="author" content="Binpeng Liu Hangzhou Normal University Software enginerring 121" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- basic styles -->

    <link href="../view/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../view/assets/css/font-awesome.min.css" />

    <!--[if IE 7]>

    <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />

    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="../view/assets/css/fontFamily.css" />

    <!-- ace styles -->

    <link rel="stylesheet" href="../view/assets/css/ace.min.css" />
    <link rel="stylesheet" href="../view/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="../view/assets/css/ace-skins.min.css" />

    <!--[if lte IE 8]>

    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />

    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="../view/assets/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="assets/js/html5shiv.js"></script>

    <script src="assets/js/respond.min.js"></script>

    <![endif]-->

</head>

<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="account.php" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    动物管理系统
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">
                                    <?php
                                    $pdo=new PDO('mysql:host=localhost;dbname=db_pet','root','root');
                                    $sql1="select COUNT(*) from cageapply  where  ispost = 1 and status = 0 order by time  asc";
                                    $stmt1=$pdo->prepare($sql1);
                                    $stmt1->execute();
                                    $row1=$stmt1->fetch();
                                    echo $row1[0];
                                    ?>
                                </span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-warning-sign"></i>
                            <?php
                            echo $row1[0];
                            ?> 条新笼位申请
                        </li>
                        <li>
                            <a href="applycheck.php">
                                查看全部
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="../view/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎,</small>
                                    <?php
                                    echo $_SESSION["username"];
                                    ?>
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="../controller/loginOut.php">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>


<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="icon-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="icon-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="icon-group"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="icon-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- #sidebar-shortcuts -->
            <ul class="nav nav-list">
                <li class="active"><a href="applycheck.php"> <i
                            class="icon-text-width"></i> <span class="menu-text"> 笼位审核</span>
                    </a></li>



                <li><a href="MDcheck.php" class="dropdown-toggle"> <i
                            class="icon-desktop"></i> <span class="menu-text"> 指令校验 </span> <b
                            class="arrow icon-angle-down"></b>
                    </a></li>
                <li>
                    <a href="profile.php" class="dropdown-toggle">
                        <i class="icon-user"></i>
                        <span class="menu-text">个人资料 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>
                </li>




            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="account.php">主页</a>
                    </li>

                    <li class="active">
                        <a href="account.php">新笼位审核</a>
                    </li>
                </ul><!-- .breadcrumb -->
            </div>

            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table id="sample-table-1"
                                               class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="center">编号</th>
                                                <th class="center">序号</th>
                                                <th class="center">耳标</th>
                                                <th class="center">动物名称</th>
                                                <th class="hidden-480 center">背景品系</th>
                                                <th class="center"><i
                                                        class="icon-time bigger-110 hidden-480"></i> 基因类别</th>
                                                <th class="hidden-480 center">毛色类别</th>
                                                <th hidden="true">申请人</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                        $cageid=$_REQUEST['id'];
                                        $pdou=new PDO('mysql:host=localhost;dbname=db_pet','root','root');
                                        $pdou->query("set names utf8");
                                        $sqlu="select * from mouseapply  where  cageid = ? order by id  asc";
                                        $stmtu=$pdou->prepare($sqlu);
                                        $stmtu->execute(array($cageid));
                                        $allrowsu = $stmtu->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($allrowsu as $rowu):
                                            ?>
                                            <tr>
                                                <td class="center"><?php echo $rowu['mouseid']; ?><a href="#"></a></td>
                                                <td class="center" id="" name=""><?php echo $rowu['id']; ?></td>
                                                <td class="center"><?php echo $rowu['erbiao']; ?></td>
                                                <td class="hidden-480 center"><?php echo $rowu['name']; ?></td>
                                                <td class="center"><?php echo $rowu['breed']; ?></td>
                                                <td class="hidden-480 center"><?php echo $rowu['gene']; ?></td>
                                                <td class="hidden-480 center"><?php echo $rowu['furcolor']; ?></td>
                                                <span id="cageid" hidden="hidden"><?php echo $rowu['cageid']; ?> </span>
                                            </tr>
                                            <?php
                                        endforeach;
                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <div class="space-4"></div>
                            <div class="space-4"></div>
                            <div class="space-4"></div>
                            <div class="clearfix form-actions">
                                批阅意见
                                <textarea cols="130" rows="6" id="message"></textarea>
                                <div class="col-md-offset-3 col-md-12" style="margin-top: 20px;">
                                    <button class="btn btn-info" type="button" name="dddsss"
                                            id="dddsss">
                                        <i class="icon-ok bigger-110"></i> 通过
                                    </button>
                                    <a  href="javascript:;" onclick="refuse()" class='btn btn-danger'  role='button'> <i class="icon-remove bigger-110"></i> 驳回</a>
                                    <span  id="result" style="color:#FF0000;"></span>
                                    <br />

                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.page-content -->
    </div>
    <!-- /.main-content -->

    <script>
        document.getElementById("dddsss").onclick = function() {
            window.location.href = "doctorcheck.php?cageid="
                                    + document.getElementById("cageid").innerHTML;
        }
        function refuse(){
            var request = new XMLHttpRequest();
            request.open("POST", "../controller/applyreturn.php");
            var data = "&cageid=" + document.getElementById("cageid").innerHTML
                + "&re=" + "2" + "&message="
                + document.getElementById("message").value;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(data);
            request.onreadystatechange = function() {
                if (request.readyState===4) {
                    if (request.status===200) {

                        document.getElementById("result").innerHTML="驳回成功!";
                        window.setTimeout("location.href='applyCheck.php'",1000);
                    } else {
                        alert("发生错误：" + request.status);
                    }
                }
            }
        }
        </script>


    <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="icon-cog bigger-150"></i>
            </div>

            <div class="ace-settings-box" id="ace-settings-box">
                <div>
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="default" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                    <label class="lbl" for="ace-settings-add-container">
                        Inside
                        <b>.container</b>
                    </label>
                </div>
            </div>
        </div><!-- /#ace-settings-container -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script src="http://cdn.bootcss.com/jquery/2.0.3/jquery.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>

<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='../view/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>

<script type="text/javascript">

    window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");

</script>

<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='../view/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="../view/assets/js/bootstrap.min.js"></script>
<script src="../view/assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<script src="../view/assets/js/jquery.dataTables.min.js"></script>
<script src="../view/assets/js/jquery.dataTables.bootstrap.js"></script>

<!-- ace scripts -->

<script src="../view/assets/js/ace-elements.min.js"></script>
<script src="../view/assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    jQuery(function($) {
        var oTable1 = $('#sample-table-2').dataTable( {
            "aoColumns": [
                { "bSortable": false },
                null, null,null, null, null,
                { "bSortable": false }
            ] } );


        $('table th input:checkbox').on('click' , function(){
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function(){
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });


        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }
    })
</script>
<div style="display:none"><script src="../view/assets/js/stat.js"></script></div>
</body>
</html>