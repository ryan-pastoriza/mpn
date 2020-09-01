{{-- Statistics --}}
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Statistics
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li>
                        <a href="javascript:void(0);" id="reload-content-records" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                            <i class="material-icons">loop</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="body" style="padding: 0px; margin: 0px;">
                <div class="row clearfix">
                    {{-- Bar Chart --}}
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a onclick='printJ("#bar_chart")'>Print
                                                <i class="material-icons">printer</i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body" style="overflow-x: scroll;">
                                {{-- <div id="line_chart" class="graph" hidden=""></div> --}}
                                <center><img id="loading" src="images/loading.gif" width="20" height="20" hidden></center>
                                <div class="printme" id="bar_chart" class="graph"></div>
                            </div>
                        </div>
                    </div>
                    {{-- #END# Bar Chart --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- #End Statistics --}}