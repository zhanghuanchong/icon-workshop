<style type="text/css">
    #tp_contents #tp_android .description {
        border-top-width: 0;
        line-height: 1.8em;
        margin-top: 0;
    }
    #tp_contents #tp_android .icons-row {
        margin-bottom: 15px;
    }
</style>

<?php
$basePath = $design->folder . '/' . $design->id . '/android/';
?>

<div role="tabpanel" class="tab-pane fade" id="tp_android">
    <div class="row">
        <div class="col-md-6" style="background: url('/img/nexus5.png') no-repeat; height:743px;">
            <div style="position: absolute; left:50px; top:180px;">
                <img src="/files/<?php echo $design->getFilePath(); ?>" alt="" style="width:64px; height:64px;" />
                <p style="color: #ccc;font-weight: normal;font-size: 12px;text-align: center;padding-top: 8px; font-weight:bold">您的应用</p>
            </div>
        </div>
        <div class="col-md-6 icons-col">
            <div class="row icons-row">
                <div class="col-sm-6">
                    <div style="line-height: 48px; vertical-align: middle">
                        <img src="/files/<?php echo $basePath ?>drawable-ldpi/ic_launcher.png" alt="" style="width:36px; height:36px;" />
                    </div>
                    <div class="description">
                        1x<br/>
                        LDPI
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <img src="/files/<?php echo $basePath ?>drawable-mdpi/ic_launcher.png" alt="" style="width:48px; height:48px;" />
                    </div>
                    <div class="description">
                        1x<br/>
                        MDPI
                    </div>
                </div>
            </div>
            <div class="row icons-row">
                <div class="col-sm-6">
                    <div style="line-height: 96px; vertical-align: middle">
                        <img src="/files/<?php echo $basePath ?>drawable-hdpi/ic_launcher.png" alt="" style="width:72px; height:72px;" />
                    </div>
                    <div class="description">
                        1.5x<br/>
                        HDPI
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <img src="/files/<?php echo $basePath ?>drawable-xhdpi/ic_launcher.png" alt="" style="width:96px; height:96px;" />
                    </div>
                    <div class="description">
                        2x<br/>
                        XDPI
                    </div>
                </div>
            </div>
            <div class="row icons-row">
                <div class="col-sm-6">
                    <div style="line-height: 192px; vertical-align: middle">
                        <img src="/files/<?php echo $basePath ?>drawable-xxhdpi/ic_launcher.png" alt="" style="width:144px; height:144px;" />
                    </div>
                    <div class="description">
                        3x<br/>
                        XXDPI
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <img src="/files/<?php echo $basePath ?>drawable-xxxhdpi/ic_launcher.png" alt="" style="width:192px; height:192px;" />
                    </div>
                    <div class="description">
                        4x<br/>
                        XXXDPI
                    </div>
                </div>
            </div>
            <div class="row icons-row" style="padding-top: 30px">
                <div class="col-sm-12">
                    以及
                    <a href="/files/<?php echo $basePath ?>playstore-icon.png"><span class="label label-info" style="font-size:13px;">Google Play 图标</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
