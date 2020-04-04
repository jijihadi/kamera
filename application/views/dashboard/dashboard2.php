 <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
 j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WLQL39J');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
    var themeName = location.hash || 'material';
    themeName = themeName.replace('#', '');
    window.ripple = (themeName === "material")
    document.write('<link href="<?php echo base_url() ?>assets/choi_jadwal/dist/' + themeName + '.css" rel="stylesheet">');
</script>
<script type="text/javascript">
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
        document.write("<script src=\'https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.5/bluebird.min.js\'>");
    }</script>
    <script src="<?php echo base_url() ?>assets/choi_jadwal/dist/ej2.min.js" type="text/javascript"></script>
    <link href="<?php echo base_url() ?>assets/choi_jadwal/index.css" rel="stylesheet">
    <style>
        #loader {
            color: #008cff;
            height: 40px;
            left: 45%;
            position: absolute;
            top: 45%;
            width: 30%;
        }

        body {
            touch-action: none;
        }
    </style>


    <!-- /#header -->
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="control-content">
                <div class="container-fluid">
                    <div class="control-section">
                        <div class="col-lg-12 control-section">
                            <div >
                                <div id="Schedule"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="description-section">Description</div>
                <div id="description">
                    <p>
                        deskripsi

                    </p>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->

<script type="text/javascript">


    window.applyCategoryColor = function (args, currentView) {
        var categoryColor = args.data.CategoryColor;
        if (!args.element || !categoryColor) {
            return;
        }
        if (currentView === 'Agenda') {
            (args.element.firstChild).style.borderLeftColor = categoryColor;
        } else {
            args.element.style.backgroundColor = categoryColor;
        }
    };


    window.resourceData = [
    ];
        window.timelineResourceData = [
        <?php 
        foreach ($datapinjaman as $value) {
            ?>
            {
                Id: <?php echo $value['Id']; ?>,
                Subject: "<?php echo $value['Subject']; ?>",
                StartTime: <?php echo $value['StartTime']; ?>,
                EndTime: <?php echo $value['EndTime']; ?>,
                IsAllDay: false,
                Description: "<?php echo $value['Description']; ?>",
                Location: '<?php echo  $value['Location']; ?>',
                ProjectId: <?php echo  $value['ProjectId']; ?>,
                TaskId: <?php echo $value['TaskId']; ?>
            },
            <?php 
        }
        ?>
        ];


    </script>

    <script type="text/javascript">
        ej.base.enableRipple(window.ripple)

        var data = new ej.base.extend([], window.resourceData.concat(window.timelineResourceData), null, true);
        var scheduleOptions = {
            width: '100%',
            height: '650px',
            selectedDate: new Date(),
            views: ['TimelineDay', 'TimelineWeek', 'TimelineWorkWeek', 'TimelineMonth', 'Agenda'],
            currentView: 'TimelineMonth',
            group: {
                resources: ['Projects', 'Categories']
            },
            resources: [
            {
                field: 'ProjectId', title: 'Choose Project', name: 'Projects',
                dataSource: [
                <?php 
                foreach ($datakamera as $key => $value) {
                 ?>
                 { text: '<?php echo $value->nama_kamera; ?>', id: <?php echo $value->id_kamera; ?>, color: '#cb6bb2' },
                 <?php 
             }
             ?>
             ],
             textField: 'text', idField: 'id', colorField: 'color'
         }, {
            field: 'TaskId', title: 'Category',
            name: 'Categories', allowMultiple: true,
            dataSource: [
                //data jenis kamera
                <?php 
                foreach ($datatipekamera as $key => $value) {
                 ?>
                 { text: '<?php echo $value->nama_tipe_kamera; ?>', id: <?php echo $value->id_tipe_kamera; ?>,groupId: <?php echo $value->id_kamera; ?>, color: '#cb6bb2' },
                 <?php 
             }
             ?>
             ],
             textField: 'text', idField: 'id', groupIDField: 'groupId', colorField: 'color'
         }
         ],
         eventSettings: {
            dataSource: data
        }

    };
    var scheduleObj = new ej.schedule.Schedule(scheduleOptions, '#Schedule');


</script>