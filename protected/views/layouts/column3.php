<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="zh-cn" />
    <script type="text/javascript">
        $(document).ready(function() {
            $("#carousel").featureCarousel({
                autoPlay:7000,
                trackerIndividual:false,
                trackerSummation:false,
                topPadding:50,
                smallFeatureWidth:.9,
                smallFeatureHeight:.9,
                sidePadding:0,
                smallFeatureOffset:0
            });
        });
    </script>
</head>
    <?php echo $content; ?>
