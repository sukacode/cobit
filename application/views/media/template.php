<?php
defined('BASEPATH') or exit('No direct script access allowed');

if ($this->session->userdata('is_logged_in') != true) {
	redirect(base_url('auth'));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Rendang Mak Yus</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link rel="icon" href="<?php echo base_url('favicon.ico') ?>" type="image/ico">
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
		   <link rel="stylesheet" href="<?php echo base_url() ?>aceadmin/assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="<?php echo base_url() ?>aceadmin/assets/js/ace-extra.min.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
		<script src="<?php //echo base_url()
						?>aceadmin/assets/js/html5shiv.min.js"></script>
		<script src="<?php //echo base_url()
						?>aceadmin/assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default          ace-save-state" style="background-color:#999">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="" class="navbar-brand">
					<small>
						<i class="fa fa-pie-chart"></i>
						Rendang Mak Yus
					</small>
				</a>
			</div>


		</div><!-- /.navbar-container -->
	</div>
	<div class="main-container ace-save-state" id="main-container" style="">
		<script type="text/javascript">
			try {
				ace.settings.loadState('main-container')
			} catch (e) {}
		</script>

		<div id="sidebar" class="sidebar responsive ace-save-state compact">
			<script type="text/javascript">
				try {
					ace.settings.loadState('sidebar')
				} catch (e) {}
			</script>

			<!-- /.sidebar-shortcuts -->
			<ul class="nav nav-list">
				<li>
					<a href="<?php echo base_url('main/dashboard') ?>">
						<i></i>
						<span class="menu-text"> Home </span>
					</a>
					<b class="arrow"></b>
				</li>
				<?php if ($this->session->userdata('status_user') == 'Admin') { ?>
					<li class="">
						<a href="<?php echo base_url('domain/domain') ?>">

							<span class="menu-text">Data Domain </span>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } ?>
				<?php if ($this->session->userdata('status_user') == 'User') { ?>
					<li class="hover">
						<a href="#" class="dropdown-toggle">

							<span class="menu-text">
								Penilaian Kusioner
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<?php
						$this->db->select('*')
							->from('tbl_domain');
						$query = $this->db->get()->result();
						?>
						<ul class="submenu">
							<?php foreach ($query as $row1) { ?>
								<li class="">
									<a href="<?php echo base_url('nilai/Data_nilai/get_nilai/' . $row1->id_domain . '') ?>">

										<?php echo $row1->nama_domain . '&nbsp' . 'Level' . $row1->level; ?>
										<b class="arrow"></b>
									</a>
								</li>
							<?php } ?>
						</ul>

					</li>
				<?php } ?>

				<?php if ($this->session->userdata('status_user') == 'Admin') { ?>
					<li class="">
						<a href="<?php echo base_url('nilai/Data_Nilai') ?>">

							<span class="menu-text">Data Nilai Kusioner </span>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } ?>
				<?php if ($this->session->userdata('status_user') == 'Admin') { ?>
					<li class="">
						<a href="<?php echo base_url('nilai/Data_Nilai/matury') ?>">

							<span class="menu-text">Data Nilai Hasil Index Maturity Level </span>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } ?>
				<?php if ($this->session->userdata('status_user') == 'Admin') { ?>
					<li class="">
						<a href="<?php echo base_url('nilai/Data_Nilai/gap') ?>">

							<span class="menu-text">Data Hasil Perbandingan GAP Maturity Level</span>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } ?>

				<?php if ($this->session->userdata('status_user') == 'Admin') { ?>
					<li class="">
						<a href="#" class="dropdown-toggle">

							<span class="menu-text">
								Pengaturan
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="<?php echo base_url('user/user_list') ?>">

									Data User
									<b class="arrow"></b>
								</a>
							</li>


						</ul>
					</li>

					<li class="">
						<a href="<?php echo base_url('profil_user/details') ?>">

							<span class="menu-text">Profil Pengguna </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="<?php echo base_url('auth/logout') ?>">

							<span class="menu-text">Logout </span>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } ?>

				<?php if ($this->session->userdata('status_user') == 'User') { ?>
					<li class="">
						<a href="<?php echo base_url('auth/logout') ?>">

							<span class="menu-text">Logout </span>
						</a>
						<b class="arrow"></b>
					</li>
				<?php } ?>

			</ul>
			</li>
			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">

			</div>
		</div>

		<div class="main-content">
			<div class="main-content-inner">


				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">



					</div><!-- /.ace-settings-container -->
					<?php echo $contents; ?>

				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">

						All rights reserved. &copy; 2021
					</span>

					&nbsp; &nbsp;

				</div>
			</div>
		</div>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="<?php echo base_url() ?>aceadmin/assets/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
<script src="<?php echo base_url() ?>aceadmin/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>aceadmin/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/bootstrap.min.js"></script>
	<!-- page specific plugin scripts -->
	<script src="<?php echo base_url() ?>aceadmin/assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/jquery.dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/buttons.colVis.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/dataTables.select.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/chosen.jquery.min.js"></script>

	<!-- progress pie chart -->
	<script src="<?php echo base_url() ?>aceadmin/assets/js/jquery.easypiechart.min.js"></script>

	<!-- date time picker js -->
	<script src="<?php echo base_url() ?>aceadmin/assets/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/bootstrap-timepicker.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- ace scripts -->
	<script src="<?php echo base_url() ?>aceadmin/assets/js/ace-elements.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/assets/js/ace.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/js/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url() ?>aceadmin/js/myscript.js"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function($) {
			//initiate dataTables plugin
			var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable({
					bAutoWidth: false,
					"aoColumns": [{
							"bSortable": false
						},
						null, null, null, null, null,
						{
							"bSortable": false
						}
					],
					"aaSorting": [],


					//"bProcessing": true,
					//"bServerSide": true,
					//"sAjaxSource": "http://127.0.0.1/table.php"	,

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					//"iDisplayLength": 50


					select: {
						style: 'multi'
					}
				});



			$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

			new $.fn.dataTable.Buttons(myTable, {
				buttons: [{
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					},
					{
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					},
					{
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					}
				]
			});
			myTable.buttons().container().appendTo($('.tableTools-container'));

			//style the message box
			var defaultCopyAction = myTable.button(1).action();
			myTable.button(1).action(function(e, dt, button, config) {
				defaultCopyAction(e, dt, button, config);
				$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
			});


			var defaultColvisAction = myTable.button(0).action();
			myTable.button(0).action(function(e, dt, button, config) {

				defaultColvisAction(e, dt, button, config);


				if ($('.dt-button-collection > .dropdown-menu').length == 0) {
					$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
				}
				$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
			});

			////

			setTimeout(function() {
				$($('.tableTools-container')).find('a.dt-button').each(function() {
					var div = $(this).find(' > div').first();
					if (div.length == 1) div.tooltip({
						container: 'body',
						title: div.parent().text()
					});
					else $(this).tooltip({
						container: 'body',
						title: $(this).text()
					});
				});
			}, 500);





			myTable.on('select', function(e, dt, type, index) {
				if (type === 'row') {
					$(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
				}
			});
			myTable.on('deselect', function(e, dt, type, index) {
				if (type === 'row') {
					$(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
				}
			});




			/////////////////////////////////
			//table checkboxes
			$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

			//select/deselect all rows according to table header checkbox
			$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function() {
				var th_checked = this.checked; //checkbox inside "TH" table header

				$('#dynamic-table').find('tbody > tr').each(function() {
					var row = this;
					if (th_checked) myTable.row(row).select();
					else myTable.row(row).deselect();
				});
			});

			//select/deselect a row when the checkbox is checked/unchecked
			$('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
				var row = $(this).closest('tr').get(0);
				if (this.checked) myTable.row(row).deselect();
				else myTable.row(row).select();
			});



			$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
				e.stopImmediatePropagation();
				e.stopPropagation();
				e.preventDefault();
			});



			//And for the first simple table, which doesn't have TableTools or dataTables
			//select/deselect all rows according to table header checkbox
			var active_class = 'active';
			$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
				var th_checked = this.checked; //checkbox inside "TH" table header

				$(this).closest('table').find('tbody > tr').each(function() {
					var row = this;
					if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
					else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
				});
			});

			//select/deselect a row when the checkbox is checked/unchecked
			$('#simple-table').on('click', 'td input[type=checkbox]', function() {
				var $row = $(this).closest('tr');
				if ($row.is('.detail-row ')) return;
				if (this.checked) $row.addClass(active_class);
				else $row.removeClass(active_class);
			});



			/********************************/
			//add tooltip for small view action buttons in dropdown menu
			$('[data-rel="tooltip"]').tooltip({
				placement: tooltip_placement
			});

			//tooltip placement on right or left
			function tooltip_placement(context, source) {
				var $source = $(source);
				var $parent = $source.closest('table')
				var off1 = $parent.offset();
				var w1 = $parent.width();

				var off2 = $source.offset();
				//var w2 = $source.width();

				if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
				return 'left';
			}




			/***************/
			$('.show-details-btn').on('click', function(e) {
				e.preventDefault();
				$(this).closest('tr').next().toggleClass('open');
				$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
			});
			/***************/





			/**
			//add horizontal scrollbars to a simple table
			$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
			  {
				horizontal: true,
				styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
				size: 2000,
				mouseWheelLock: true
			  }
			).css('padding-top', '12px');
			*/


		})
	</script>
	<script type="text/javascript">
		jQuery(function($) {
			$('.easy-pie-chart.percentage').each(function() {
				var $box = $(this).closest('.infobox');
				var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
				var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
				var size = parseInt($(this).data('size')) || 50;
				$(this).easyPieChart({
					barColor: barColor,
					trackColor: trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: parseInt(size / 10),
					animate: ace.vars['old_ie'] ? false : 1000,
					size: size
				});
			})

			$('.sparkline').each(function() {
				var $box = $(this).closest('.infobox');
				var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
				$(this).sparkline('html', {
					tagValuesAttribute: 'data-values',
					type: 'bar',
					barColor: barColor,
					chartRangeMin: $(this).data('min') || 0
				});
			});


			//flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			//but sometimes it brings up errors with normal resize event handlers
			$.resize.throttleWindow = false;

			var placeholder = $('#piechart-placeholder').css({
				'width': '90%',
				'min-height': '150px'
			});
			var data = [{
					label: "social networks",
					data: 38.7,
					color: "#68BC31"
				},
				{
					label: "search engines",
					data: 24.5,
					color: "#2091CF"
				},
				{
					label: "ad campaigns",
					data: 8.2,
					color: "#AF4E96"
				},
				{
					label: "direct traffic",
					data: 18.6,
					color: "#DA5430"
				},
				{
					label: "other",
					data: 10,
					color: "#FEE074"
				}
			]

			function drawPieChart(placeholder, data, position) {
				$.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt: 0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne",
						labelBoxBorderColor: null,
						margin: [-30, 15]
					},
					grid: {
						hoverable: true,
						clickable: true
					}
				})
			}
			drawPieChart(placeholder, data);

			/**
			we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			so that's not needed actually.
			*/
			placeholder.data('chart', data);
			placeholder.data('draw', drawPieChart);


			//pie chart tooltip example
			var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			var previousPoint = null;

			placeholder.on('plothover', function(event, pos, item) {
				if (item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent'] + '%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({
						top: pos.pageY + 10,
						left: pos.pageX + 10
					});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}

			});

			/////////////////////////////////////
			$(document).one('ajaxloadstart.page', function(e) {
				$tooltip.remove();
			});




			var d1 = [];
			for (var i = 0; i < Math.PI * 2; i += 0.5) {
				d1.push([i, Math.sin(i)]);
			}

			var d2 = [];
			for (var i = 0; i < Math.PI * 2; i += 0.5) {
				d2.push([i, Math.cos(i)]);
			}

			var d3 = [];
			for (var i = 0; i < Math.PI * 2; i += 0.2) {
				d3.push([i, Math.tan(i)]);
			}


			var sales_charts = $('#sales-charts').css({
				'width': '100%',
				'height': '220px'
			});
			$.plot("#sales-charts", [{
					label: "Domains",
					data: d1
				},
				{
					label: "Hosting",
					data: d2
				},
				{
					label: "Services",
					data: d3
				}
			], {
				hoverable: true,
				shadowSize: 0,
				series: {
					lines: {
						show: true
					},
					points: {
						show: true
					}
				},
				xaxis: {
					tickLength: 0
				},
				yaxis: {
					ticks: 10,
					min: -2,
					max: 2,
					tickDecimals: 3
				},
				grid: {
					backgroundColor: {
						colors: ["#fff", "#fff"]
					},
					borderWidth: 1,
					borderColor: '#555'
				}
			});


			$('#recent-box [data-rel="tooltip"]').tooltip({
				placement: tooltip_placement
			});

			function tooltip_placement(context, source) {
				var $source = $(source);
				var $parent = $source.closest('.tab-content')
				var off1 = $parent.offset();
				var w1 = $parent.width();

				var off2 = $source.offset();
				//var w2 = $source.width();

				if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
				return 'left';
			}


			$('.dialogs,.comments').ace_scroll({
				size: 300
			});


			//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
			//so disable dragging when clicking on label
			var agent = navigator.userAgent.toLowerCase();
			if (ace.vars['touch'] && ace.vars['android']) {
				$('#tasks').on('touchstart', function(e) {
					var li = $(e.target).closest('#tasks li');
					if (li.length == 0) return;
					var label = li.find('label.inline').get(0);
					if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
				});
			}

			$('#tasks').sortable({
				opacity: 0.8,
				revert: true,
				forceHelperSize: true,
				placeholder: 'draggable-placeholder',
				forcePlaceholderSize: true,
				tolerance: 'pointer',
				stop: function(event, ui) {
					//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
					$(ui.item).css('z-index', 'auto');
				}
			});
			$('#tasks').disableSelection();
			$('#tasks input:checkbox').removeAttr('checked').on('click', function() {
				if (this.checked) $(this).closest('li').addClass('selected');
				else $(this).closest('li').removeClass('selected');
			});


			//show the dropdowns on top or bottom depending on window height and menu position
			$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
				var offset = $(this).offset();

				var $w = $(window)
				if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
					$(this).addClass('dropup');
				else $(this).removeClass('dropup');
			});

		})
	</script>
</body>

</html>