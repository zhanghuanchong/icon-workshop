<?php
$basePath = $design->folder . '/' . $design->id . '/phonegap/';
?>

<div role="tabpanel" class="tab-pane fade in" id="tp_phonegap">
    <div class="panel-group" id="accordion_phonegap" role="tablist" aria-multiselectable="true">
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion_phonegap" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Web 目录 (www)
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body icons-col">
                    <div class="row icons-row">
                        <div class="col-sm-2">
                            <div class="row icon-row">
                                <div class="col-xs-12">
                                    <img src="/files/<?php echo $basePath . 'www/icon.png' ?>" alt="" class="x4"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">128pt</div>
                            </div>
                            <div class="description">
                                Web root
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="row icon-row">
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/ios/icon-57.png' ?>" alt="" class="x1"/>
                                </div>
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/ios/icon-57-2x.png' ?>" alt="" class="x2"/>
                                </div>
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/ios/icon-72.png' ?>" alt="" class="x1"/>
                                </div>
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/ios/icon-72-2x.png' ?>" alt="" class="x2"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">1x 57pt</div>
                                <div class="col-xs-3">2x 57pt</div>
                                <div class="col-xs-3">1x 72pt</div>
                                <div class="col-xs-3">2x 72pt</div>
                            </div>
                            <div class="description">
                                iOS
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row no-radius">
                        <div class="col-sm-12">
                            <div class="row icon-row">
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/android/icon-36-ldpi.png' ?>" alt="" class="x1"/>
                                </div>
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/android/icon-48-mdpi.png' ?>" alt="" class="x1"/>
                                </div>
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/android/icon-72-hdpi.png' ?>" alt="" class="x2"/>
                                </div>
                                <div class="col-xs-3">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/android/icon-96-xhdpi.png' ?>" alt="" class="x3"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">ldpi 36pt</div>
                                <div class="col-xs-3">mdpi 48pt</div>
                                <div class="col-xs-3">hdpi 72pt</div>
                                <div class="col-xs-3">xhdpi 96pt</div>
                            </div>
                            <div class="description">
                                Android
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row no-radius">
                        <div class="col-sm-12">
                            <div class="row icon-row">
                                <div class="col-xs-4">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/windows-phone/icon-48.png' ?>" alt="" class="x1"/>
                                </div>
                                <div class="col-xs-4">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/windows-phone/icon-62-tile.png' ?>" alt="" class="x2"/>
                                </div>
                                <div class="col-xs-4">
                                    <img src="/files/<?php echo $basePath . 'www/res/icon/windows-phone/icon-173-tile.png' ?>" alt="" class="x4"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">48pt</div>
                                <div class="col-xs-4">62pt Tile</div>
                                <div class="col-xs-4">173pt Tile</div>
                            </div>
                            <div class="description">
                                Windows Phone
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_phonegap" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        iOS 平台 (platforms/ios)
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body icons-col">
                    <div class="row icons-row">
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-small.png' ?>" alt="" class="x1"/>
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-small@2x.png' ?>" alt="" class="x3"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPhone<br/>
                                Spotlight - iOS 6,6<br/>
                                Settings - iOS 5-8<br/>
                                29pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-12">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-40@2x.png' ?>" alt="" class="x3"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">2x</div>
                            </div>
                            <div class="description">
                                iPhone Spotlight<br/>
                                iOS 7, 8<br/>
                                40pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon.png' ?>" alt="" class="x3" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon@2x.png' ?>" alt="" class="x3" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPhone App<br/>
                                iOS 5,6<br/>
                                57pt
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-60@2x.png' ?>" alt="" class="x3" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-60@3x.png' ?>" alt="" class="x3" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">2x</div>
                                <div class="col-xs-6">3x</div>
                            </div>
                            <div class="description">
                                iPhone App<br/>
                                iOS 7,8<br/>
                                60pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-small.png' ?>" alt="" class="x1"/>
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-small@2x.png' ?>" alt="" class="x3"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Settings<br/>
                                iOS 5, 8<br/>
                                29pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-40.png' ?>" alt="" class="x2" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-40@2x.png' ?>" alt="" class="x3" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Spotlight<br/>
                                iOS 7,8<br/>
                                40pt
                            </div>
                        </div>
                    </div>
                    <div class="row icons-row">
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-50.png' ?>" alt="" class="x3" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-50@2x.png' ?>" alt="" class="x3" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Spotlight<br/>
                                iOS 5,6<br/>
                                50pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-72.png' ?>" alt="" class="x3"/>
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-72@2x.png' ?>" alt="" class="x3"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad Add<br/>
                                iOS 5, 8<br/>
                                72pt
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row icon-row">
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-76.png' ?>" alt="" class="x3" />
                                </div>
                                <div class="col-xs-6">
                                    <img src="/files/<?php echo $basePath . 'platforms/ios/Resources/icons/icon-76@2x.png' ?>" alt="" class="x3" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">1x</div>
                                <div class="col-xs-6">2x</div>
                            </div>
                            <div class="description">
                                iPad App<br/>
                                iOS 7,8<br/>
                                76pt
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_phonegap" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        安卓平台 (platforms/android)
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body icons-col icons-row no-radius">
                    <div class="row icon-row">
                        <div class="col-xs-2">
                            <img src="/files/<?php echo $basePath . 'platforms/android/res/drawable/icon.png' ?>" alt="" class="x3" />
                        </div>
                        <div class="col-xs-2">
                            <img src="/files/<?php echo $basePath . 'platforms/android/res/drawable-ldpi/icon.png' ?>" alt="" class="x1" />
                        </div>
                        <div class="col-xs-2">
                            <img src="/files/<?php echo $basePath . 'platforms/android/res/drawable-mdpi/icon.png' ?>" alt="" class="x1" />
                        </div>
                        <div class="col-xs-2">
                            <img src="/files/<?php echo $basePath . 'platforms/android/res/drawable-hdpi/icon.png' ?>" alt="" class="x2" />
                        </div>
                        <div class="col-xs-2">
                            <img src="/files/<?php echo $basePath . 'platforms/android/res/drawable-xhdpi/icon.png' ?>" alt="" class="x3" />
                        </div>
                        <div class="col-xs-2">
                            <img src="/files/<?php echo $basePath . 'platforms/android/res/drawable-xxhdpi/icon.png' ?>" alt="" class="x4" />
                        </div>
                    </div>
                    <div class="description" style="margin-left: -15px; margin-right: -15px;">
                        <div class="col-xs-2">96pt default</div>
                        <div class="col-xs-2">36pt ldpi</div>
                        <div class="col-xs-2">48pt mdpi</div>
                        <div class="col-xs-2">72pt hdpi</div>
                        <div class="col-xs-2">96pt xhdpi</div>
                        <div class="col-xs-2">144pt xxhdpi</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_phonegap" href="#collapseFour" aria-expanded="false" aria-controls="headingFour">
                        Windows Phone 平台 (platforms/wp8)
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body icons-col icons-row no-radius">
                    <div class="row icon-row">
                        <div class="col-xs-4">
                            <img src="/files/<?php echo $basePath . 'platforms/wp8/ApplicationIcon.png' ?>" alt="" class="x2" />
                        </div>
                        <div class="col-xs-4">
                            <img src="/files/<?php echo $basePath . 'platforms/wp8/TileMedium.png' ?>" alt="" class="x4" />
                        </div>
                        <div class="col-xs-4">
                            <img src="/files/<?php echo $basePath . 'platforms/wp8/TileSmall.png' ?>" alt="" class="x2" />
                        </div>
                    </div>
                    <div class="description" style="margin-left: -15px; margin-right: -15px;">
                        <div class="col-xs-4">110pt application icon</div>
                        <div class="col-xs-4">202pt medium tile</div>
                        <div class="col-xs-4">110pt small tile</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
