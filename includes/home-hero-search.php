<form action="/catalog/#filterBlock" class="filter-form" method="GET">
	<div class="filter-row">
		<div class="filter-col">
			<select name="posts" class="custom-select jsAction">
				<option value="0">Купить/Арендовать</option>
				<option value="1">Купить</option>
				<option value="2">Арендовать</option>
			</select>
		</div> <!-- //.col -->
		<div class="filter-col">
			<select name="type" class="custom-select jsObjects">
				<option value="0">Любой тип</option>
				<option value="1">Квартиру</option>
				<option value="2">Дом / Коттедж</option>
				<option value="3">Таунхаус</option>
				<option value="4">Участок</option>
				<option value="5">Коммерческая</option>
			</select>
		</div> <!-- //.col -->
		<div class="filter-col jsFlatCtrl">
			<select name="new" class="custom-select jsFlatType">
				<option value="0">В категории</option>
				<option value="1">В новостройке</option>
				<option value="2">Вторичку</option>
			</select>
		</div> <!-- //.col -->
		<div class="filter-col jsFlatCtrl">
			<select name="rooms" class="custom-select jsRooms">
				<option value="">Комнат</option>
				<option value="1">1-комн.</option>
				<option value="2">2-комн.</option>
				<option value="3">3-комн.</option>
				<option value="4">4-комн.</option>
				<option value="5">Больше 4-х</option>
			</select>
		</div> <!-- //.col -->
		<div class="filter-col filter-col">
			<input type="text" name="loc" value="" class="form-control" placeholder="Город, адрес, метро, район">
		</div> <!-- //.col -->
		<div class="filter-col filter-col--small">
			<input type="number" min="0" name="max" value="" class="form-control" placeholder="(₽) До:">
		</div>
		<div class="filter-col filter-col--small">
			<input type="number" min="0" name="max" value="" class="form-control" placeholder="(₽) До:">
		</div> <!-- //.col -->
		<div class="filter-col">
			<button type="submit" class="btn btn-default">Подобрать</button>
		</div> <!-- //.col -->
	</div> <!-- //.form-row -->
</form> <!-- //.filters-form -->


<script>
	(function($) {
		'use strict';
		$(document).ready(function() {

			$('.jsObjects').on('change', function(e) {

				if (parseInt($(this).val()) > 1) {

					$('.jsFlatCtrl').hide();

				} else {

					$('.jsFlatCtrl').show();

				}

			});


		});
	}(jQuery));
</script>