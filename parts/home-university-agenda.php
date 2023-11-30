
<div class="container" id="cta">
	<section class="tarjeta-inicio">
		<div class="entry tarjeta-inicio__fondo-azul">
			<div class="row">
				<div class="col-md-12">
					<div class="categoria-seccion">
						<p>AGENDA UNIVERSITARIA</p>
					</div>												
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<h3 class="entry-title">Convocatorias/Vencimientos</h3>
								<div class="row">
									<div class="subheading">
										<div class="col-md-12">
											<?php 
											if( function_exists('add_eventon')){
												$args = array(		
														'show_et_ft_img' => 'yes',		
														'cal_id' => 113,
														'event_type' => 113,
														'show_upcoming' => 2,
														'number_of_months' => 2,
														'event_count' => 5,
														 );
													add_eventon($args);
												}?>											
												<hr><a class="btn-ver-mas" href="event-type/convocatorias-vencimientos/">VER MÁS</a>		
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<h3 class="entry-title">Eventos Académicos</h3>
								<div class="row">
									<div class="subheading">
										<div class="col-md-12">
											<?php if( function_exists('add_eventon')){
												$args = array(		
													'show_et_ft_img' => 'yes',		
													'cal_id' => 118,
													'event_type' => 118,
													'show_upcoming' => 2,
													'number_of_months' => 2,
													'event_count' => 5,
													 );
												add_eventon($args);
											}?>											
											<hr><a class="btn-ver-mas" href="event-type/eventos-academicos/">VER MÁS</a>			
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<h3 class="entry-title">Comunidad</h3>
								<div class="row">
									<div class="subheading">
										<div class="col-md-12">
										<?php if( function_exists('add_eventon')){
												$args = array(		
													'show_et_ft_img' => 'yes',	
													'cal_id' => 116,
													'event_type' => 116,
													'show_upcoming' => 0,
													'number_of_months' => 2,
													'event_count' => 5,
                                                    'exp_jumper' => 'no',
													 );
												add_eventon($args);
												}
										?>		
										</div>
									</div>
								</div>
								<hr><a class="btn-ver-mas" href="event-type/comunidad/">VER MÁS</a>
							</div>			
						</div>											
					</div>
				</div>
			</div>
		</div>		
	</section>
</div>