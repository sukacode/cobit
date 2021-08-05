<div class="box-header">
		<h3 class="box-title ">Nilai Matriks</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Nama</th>
					<th colspan="<?php echo $k_list; ?>">Kriteria</th>
				</tr>
				<tr>
					<?php
			for($n=1;$n<=$k_list;$n++){
				echo"<th>C{$n}</th>";
			}
			?>
				</tr>
			</thead>
			<tbody>
				<?php
						if (!empty($a_list)){
							$no = 1;
							foreach($a_list as $row){				
						?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->nama_gedung; ?></td>
					<?php $idalt = $row->id_alternatif; ?>
					<?php
							$this->db->select('*')
							->from('penilaian')
							->where('id_alternatif=',$idalt)
							->order_by('id_penilaian');
							$query = $this->db->get()->result();
					?>
					<?php foreach($query as $row1){ ?>
					<td><?php echo $row1->nilai; ?></td>
					<?php } ?>
				</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="box-header">
		<h3 class="box-title ">Nilai Matrix Normalisasi</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Nama</th>
					<th colspan="<?php echo $k_list; ?>">Kriteria</th>
				</tr>
				<tr>
					<?php
			for($n=1;$n<=$k_list;$n++){
				echo"<th>C{$n}</th>";
			}
			?>
				</tr>
			</thead>
			<tbody>
				<?php
					if (!empty($a_list)){
						$no = 1;
						
						foreach($a_list as $row){				
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->nama_gedung; ?></td>
					<?php $idalt = $row->id_alternatif; ?>
					<?php
						$this->db->select('*')
						->from('penilaian')
						->where('id_alternatif=',$idalt)
						->order_by('id_penilaian');
						$query = $this->db->get()->result();
					?>

					<?php foreach($query as $row1){ ?>
					<?php $nilai_kuadrat = 0; $total=0; ?>
					<?php
						$this->db->select('*')
						->from('penilaian')
						->where('id_kriteria=',$row1->id_kriteria);
						$query2 = $this->db->get()->result();
					?>
					<?php foreach($query2 as $row2){ ?>

					<?php $nilai_kuadrat=$nilai_kuadrat+($row2->nilai*$row2->nilai); ?>

					<?php } ?>
					<td><?php echo round(($row1->nilai/sqrt($nilai_kuadrat)),3); ?></td>
					<?php } ?>

					<?php } ?>
				</tr>

				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="box-header">
		<h3 class="box-title ">Nilai Matriks Bobot Ternormalisasi</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Nama</th>
					<th colspan="<?php echo $k_list; ?>">Kriteria</th>
				</tr>
				<tr>
					<?php
for($n=1;$n<=$k_list;$n++){
	echo"<th>C{$n}</th>";
}
?>
				</tr>

			</thead>
			<tbody>
				<?php 
	?>
				<?php
        if (!empty($a_list)){
            $no = 1;
            
            foreach($a_list as $row){				
        ?>

				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $row->nama_gedung; ?></td>
					<?php $idalt = $row->id_alternatif; ?>
					<?php
                $this->db->select('*')
                ->from('penilaian')
                ->join('kriteria', ' kriteria.id_kriteria  =  penilaian.id_kriteria', 'left')
                ->where('penilaian.id_alternatif=',$idalt)
                ->order_by('id_penilaian');
				$query = $this->db->get()->result();
			?>

					<?php $nilai_bobot = 1; $c=0;	$ymax=array(); ?>

					<?php foreach($query as $row1){ ?>
					<?php $nilai_kuadrat = 0; $total=0; ?>
					<?php
						$this->db->select('*')
						->from('penilaian')
						->where('id_kriteria=',$row1->id_kriteria);
						$query2 = $this->db->get()->result();
					?>
					<?php foreach($query2 as $row2){ ?>
					<?php $nilai_kuadrat=$nilai_kuadrat+($row2->nilai*$row2->nilai); ?>
					<?php } ?>


					<?php $nilai_normalisasi = round(($row1->nilai/sqrt($nilai_kuadrat)),3);?>

					<?php $nilai_total_bobot = $row1->bobot*$nilai_normalisasi;?>


					<td><?php echo $nilai_total_bobot; ?></td>
					<?php 
						
						$ymax[$c]=$nilai_total_bobot;
						$c++;    
					?>
					<?php } ?>



					<?php } ?>


				</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>

	<div class="box-header">
		<h3 class="box-title ">Matriks Ideal Positif (A+)</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>

					<th colspan="<?php echo $k_list; ?>">Kriteria</th>

				</tr>
				<tr>

					<?php
					if (!empty($kr_list)){
						foreach($kr_list as $row1){		
					
				?>
					<th><?php echo $row1->nama_kriteria; ?></th>
					<?php } ?>
					<?php } ?>

				</tr>
				<tr>
					<?php
for($n=1;$n<=$k_list;$n++){
	echo"<th>y<sub>$n</sub><sup>+</sup></th>";
}
?>
				</tr>

			</thead>
			<tbody>
				<?php
$i=0;
echo "<tr>";
if (!empty($kr_list)){
	foreach($kr_list as $row1){		

		
		
	
			
		$this->db->select('*')
		->from('penilaian')
		->where('id_kriteria=',$row1->id_kriteria)
		->order_by('id_penilaian');
		$query = $this->db->get()->result();
		
		$c=0;
		$ymax=array();
		foreach($query as $row2){ 
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;

			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query2 = $this->db->get()->result();

			foreach($query2 as $row3){
				$nilai_kuadrat=$nilai_kuadrat+($row3->nilai*$row3->nilai);
			}

			//hitung jml alternatif
			
			$jml_a=$ar_list;
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query3 = $this->db->get()->result();
			foreach($query3 as $row4){
				$tnilai=$tnilai+$row4->nilai;
			}
			 $bobot=$tnilai/$jml_a;
			
			 $this->db->select('*')
			->from('kriteria')
			->where('id_kriteria=',$row2->id_kriteria);
			$query4 = $this->db->get()->result();
			//nilai bobot input
			foreach($query4 as $row5){
				$bot=$row5->bobot;
				$nbot=$row5->attribut;
			}
			
			
			$v=round(($row2->nilai/sqrt($nilai_kuadrat))*$bot,4);

				$ymax[$c]=$v;
				$c++;
		}
		
		if($nbot=='Bennefit'){
        //echo "<pre>";    
        //print_r($ymax);    
        //echo "</pre>";    
    
		echo "<td>".max($ymax)."</td>";
		}else{
		echo "<td>".min($ymax)."</td>";
		}
		
		
	}
}
echo "</tr>";
?>

			</tbody>
		</table>
	</div>


	<div class="box-header">
		<h3 class="box-title ">Matriks Ideal Positif (A-)</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>

					<th colspan="<?php echo $k_list; ?>">Kriteria</th>

				</tr>
				<tr>

					<?php
					if (!empty($kr_list)){
						foreach($kr_list as $row1){		
					
				?>
					<th><?php echo $row1->nama_kriteria; ?></th>
					<?php } ?>
					<?php } ?>

				</tr>
				<tr>
					<?php
for($n=1;$n<=$k_list;$n++){
	echo"<th>y<sub>$n</sub><sup>+</sup></th>";
}
?>
				</tr>

			</thead>
			<tbody>
				<?php
$i=0;
echo "<tr>";
if (!empty($kr_list)){
	foreach($kr_list as $row1){		

		
		
	
			
		$this->db->select('*')
		->from('penilaian')
		->where('id_kriteria=',$row1->id_kriteria)
		->order_by('id_penilaian');
		$query = $this->db->get()->result();
		
		$c=0;
		$ymax=array();
		foreach($query as $row2){ 
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;

			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query2 = $this->db->get()->result();

			foreach($query2 as $row3){
				$nilai_kuadrat=$nilai_kuadrat+($row3->nilai*$row3->nilai);
			}

			//hitung jml alternatif
			
			$jml_a=$ar_list;
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query3 = $this->db->get()->result();
			foreach($query3 as $row4){
				$tnilai=$tnilai+$row4->nilai;
			}
			 $bobot=$tnilai/$jml_a;
			
			 $this->db->select('*')
			->from('kriteria')
			->where('id_kriteria=',$row2->id_kriteria);
			$query4 = $this->db->get()->result();
			//nilai bobot input
			foreach($query4 as $row5){
				$bot=$row5->bobot;
				$nbot=$row5->attribut;
			}
			
			
			$v=round(($row2->nilai/sqrt($nilai_kuadrat))*$bot,4);

				$ymax[$c]=$v;
				$c++;
		}
		
		if($nbot=='Cost'){
        //echo "<pre>";    
        //print_r($ymax);    
        //echo "</pre>";    
    
		echo "<td>".max($ymax)."</td>";
		}else{
		echo "<td>".min($ymax)."</td>";
		}
		
		
	}
}
echo "</tr>";
?>

			</tbody>
		</table>
	</div>

	<div class="box-header">
		<h3 class="box-title ">Jarak Solusi Ideal Positif (D+)</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
		<thead>
<tr>
<th ><center>Nomor</center></th>
<th ><center>Nama</center></th>
<th ><center>D<sup>+</sup></center></th>
</tr>

</thead>
<tbody>
			<?php
$i2=1;
$i3=0;
$maxarray=array();
echo "<tr>";
if (!empty($kr_list)){
	foreach($kr_list as $row1){		

			
		$this->db->select('*')
		->from('penilaian')
		->where('id_kriteria=',$row1->id_kriteria)
		->order_by('id_penilaian');
		$query = $this->db->get()->result();
		
		$jarakp2=0;
		$c2=0;
		$ymax2=array();
		foreach($query as $row2){ 
			
			//nilai kuadrat
			
			$nilai_kuadrat2=0;

			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query2 = $this->db->get()->result();

			foreach($query2 as $row3){
				$nilai_kuadrat2=$nilai_kuadrat2+($row3->nilai*$row3->nilai);
			}

			//hitung jml alternatif
			
			$jml_a2=$ar_list;
			//nilai bobot kriteria (rata")
			$bobot2=0;
			$tnilai2=0;
			
			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query3 = $this->db->get()->result();
			foreach($query3 as $row4){
				$tnilai2=$tnilai2+$row4->nilai;
			}
			 $bobot2=$tnilai2/$jml_a2;
			
			 $this->db->select('*')
			->from('kriteria')
			->where('id_kriteria=',$row2->id_kriteria);
			$query4 = $this->db->get()->result();
			//nilai bobot input
			foreach($query4 as $row5){
				$bot2=$row5->bobot;
				$nbot2=$row5->attribut;
			}
			
			
			$v=round(($row2->nilai/sqrt($nilai_kuadrat2))*$bot2,4);

				$ymax2[$c2]=$v;
				$c2++;


				if($nbot2=='Bennefit'){
					$mak2=max($ymax2);
				}else{
					$mak2=min($ymax2);
				}#cek benefit atau cost
		}
		
		
		
		foreach($ymax2 as $nymax2){
				
			$jarakp2=$jarakp2+pow($nymax2-$mak2,2);
			
		}
		
	//array max
	$maxarray[$i3]=$mak2;
			
	//print_r($maxarray);
	//print_r(max($ymax2));			
	$i2++;
	$i3++;
	}
	
}

$_SESSION['ymax']=$maxarray;
// print_r($maxarray);
$i=1;
$ii=0;
$dpreferensi=array();
echo "<tr>";
if (!empty($a_list)){
	foreach($a_list as $row1){		

		$this->db->select('*')
		->from('penilaian')
		->where('id_alternatif=',$row1->id_alternatif)
		->order_by('id_penilaian');
		$query = $this->db->get()->result();
		
		$jarakp=0;
		$c=0;
		$ymax0=array();
		$arraymaks=array();
		foreach($query as $row2){ 
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;

			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query2 = $this->db->get()->result();

			foreach($query2 as $row3){
				$nilai_kuadrat=$nilai_kuadrat+($row3->nilai*$row3->nilai);
			}

			//hitung jml alternatif
			
			$jml_a=$ar_list;
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query3 = $this->db->get()->result();
			foreach($query3 as $row4){
				$tnilai=$tnilai+$row4->nilai;
			}
			 $bobot=$tnilai/$jml_a;
			
			 $this->db->select('*')
			->from('kriteria')
			->where('id_kriteria=',$row2->id_kriteria);
			$query4 = $this->db->get()->result();
			//nilai bobot input
			foreach($query4 as $row5){
				$bot=$row5->bobot;
				$nbot=$row5->attribut;
			}
			
			
			$v=round(($row2->nilai/sqrt($nilai_kuadrat))*$bot,4);

				$ymax0[$c]=$v;
				$c++;
				$mak=max($ymax0);
		}
		
		foreach($ymax0 as $nymax=>$value ){
			
			$maks=$_SESSION['ymax'][$nymax];
				// echo $maks." - ";
                
                // echo $value."| ";
                
				$final=sqrt($jarakp=$jarakp+pow($value-$maks,2));
				// echo $jarakp." || ";
		}

	echo "<tr>
	<td>$i</td>
	<td>$row1->nama_gedung</td>
	<td>".round($final,4)."</td>
	</tr>";		
	$dpreferensi[$ii]=round($final,4);
	$_SESSION['dplus']=$dpreferensi;		
	//print_r($ymax);

	$i++;
	$ii++;
		
		
	}
}
echo "</tr>";

?>

			</tbody>
		</table>
	</div>

	<div class="box-header">
		<h3 class="box-title ">Jarak Solusi Ideal Positif (D-)</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
		<thead>
<tr>
<th ><center>Nomor</center></th>
<th ><center>Nama</center></th>
<th ><center>D<sup>+</sup></center></th>
</tr>

</thead>
<tbody>
			<?php
$i2=1;
$i3=0;
$minarray=array();
echo "<tr>";
if (!empty($kr_list)){
	foreach($kr_list as $row1){		

			
		$this->db->select('*')
		->from('penilaian')
		->where('id_kriteria=',$row1->id_kriteria)
		->order_by('id_penilaian');
		$query = $this->db->get()->result();
		
		$jarakp2=0;
		$c2=0;
		$ymin2=array();
		foreach($query as $row2){ 
			
			//nilai kuadrat
			
			$nilai_kuadrat2=0;

			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query2 = $this->db->get()->result();

			foreach($query2 as $row3){
				$nilai_kuadrat2=$nilai_kuadrat2+($row3->nilai*$row3->nilai);
			}

			//hitung jml alternatif
			
			$jml_a2=$ar_list;
			//nilai bobot kriteria (rata")
			$bobot2=0;
			$tnilai2=0;
			
			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query3 = $this->db->get()->result();
			foreach($query3 as $row4){
				$tnilai2=$tnilai2+$row4->nilai;
			}
			 $bobot2=$tnilai2/$jml_a2;
			
			 $this->db->select('*')
			->from('kriteria')
			->where('id_kriteria=',$row2->id_kriteria);
			$query4 = $this->db->get()->result();
			//nilai bobot input
			foreach($query4 as $row5){
				$bot2=$row5->bobot;
				$nbot2=$row5->attribut;
			}
			
			
			$v=round(($row2->nilai/sqrt($nilai_kuadrat2))*$bot2,4);

				$ymin2[$c2]=$v;
				$c2++;


				if($nbot2=='Cost'){
					$mak2=max($ymin2);
				}else{
					$mak2=min($ymin2);
				}#cek benefit atau cost
		}
		
		
		
		foreach($ymin2 as $nymin2){
				
			$jarakp2=$jarakp2+pow($nymin2-$mak2,2);
			
		}
		
	//array min
	$minarray[$i3]=$mak2;
			
	//print_r($minarray);
	//print_r(min($ymin2));			
	$i2++;
	$i3++;
	}
	
}

$_SESSION['ymin']=$minarray;
// print_r($minarray);
$i=1;
$ii=0;
$dpreferensi=array();
echo "<tr>";
if (!empty($a_list)){
	foreach($a_list as $row1){		

		$this->db->select('*')
		->from('penilaian')
		->where('id_alternatif=',$row1->id_alternatif)
		->order_by('id_penilaian');
		$query = $this->db->get()->result();
		
		$jarakp=0;
		$c=0;
		$ymin0=array();
		$arraymaks=array();
		foreach($query as $row2){ 
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;

			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query2 = $this->db->get()->result();

			foreach($query2 as $row3){
				$nilai_kuadrat=$nilai_kuadrat+($row3->nilai*$row3->nilai);
			}

			//hitung jml alternatif
			
			$jml_a=$ar_list;
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query3 = $this->db->get()->result();
			foreach($query3 as $row4){
				$tnilai=$tnilai+$row4->nilai;
			}
			 $bobot=$tnilai/$jml_a;
			
			 $this->db->select('*')
			->from('kriteria')
			->where('id_kriteria=',$row2->id_kriteria);
			$query4 = $this->db->get()->result();
			//nilai bobot input
			foreach($query4 as $row5){
				$bot=$row5->bobot;
				$nbot=$row5->attribut;
			}
			
			
			$v=round(($row2->nilai/sqrt($nilai_kuadrat))*$bot,4);

				$ymin0[$c]=$v;
				$c++;
				$mak=min($ymin0);
		}
		
		foreach($ymin0 as $nymin=>$value ){
			
			$maks=$_SESSION['ymin'][$nymin];
				// echo $maks." - ";
                
                // echo $value."| ";
                
				$final=sqrt($jarakp=$jarakp+pow($value-$maks,2));
				// echo $jarakp." || ";
		}

	echo "<tr>
	<td>$i</td>
	<td>$row1->nama_gedung</td>
	<td>".round($final,4)."</td>
	</tr>";		
	$dpreferensi[$ii]=round($final,4);
	$_SESSION['dmin']=$dpreferensi;		
	//print_r($ymin);
	$id_alt[$ii]=$row1->id_alternatif;
	$_SESSION['id_alt']=$id_alt;	
	$i++;
	$ii++;
		
		
	}
}
echo "</tr>";

?>

			</tbody>
		</table>
	</div>

	<div class="box-header">
		<h3 class="box-title ">Nilai Preferensi</h3>
	</div>
	<div class="table table-bordered table-responsive">
		<table class="table table-bordered table-responsive">
			<thead>
<tr>
<th ><center>Nomor</center></th>
<th ><center>Nama</center></th>
<th ><center>V<sub>i</sub></center></th>
</tr>

</thead>
			<tbody>
			<?php
$i=1;
echo "<tr>";
if (!empty($a_list)){
	foreach($a_list as $row1){		

		$this->db->select('*')
		->from('penilaian')
		->where('id_alternatif=',$row1->id_alternatif)
		->order_by('id_penilaian');
		$query = $this->db->get()->result();
		$c=0;
		$ymax=array();
		foreach($query as $row2){ 
			
			//nilai kuadrat
			
			$nilai_kuadrat=0;

			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query2 = $this->db->get()->result();

			foreach($query2 as $row3){
				$nilai_kuadrat=$nilai_kuadrat+($row3->nilai*$row3->nilai);
			}

			//hitung jml alternatif
			
			$jml_a=$ar_list;
			//nilai bobot kriteria (rata")
			$bobot=0;
			$tnilai=0;
			
			$this->db->select('*')
			->from('penilaian')
			->where('id_kriteria=',$row2->id_kriteria)
			->order_by('id_penilaian');
			$query3 = $this->db->get()->result();
			foreach($query3 as $row4){
				$tnilai=$tnilai+$row4->nilai;
			}
			 $bobot=$tnilai/$jml_a;
			
			 $this->db->select('*')
			->from('kriteria')
			->where('id_kriteria=',$row2->id_kriteria);
			$query4 = $this->db->get()->result();
			//nilai bobot input
			foreach($query4 as $row5){
				$bot=$row5->bobot;
				$nbot=$row5->attribut;
			}
			
			
			$v=round(($row2->nilai/sqrt($nilai_kuadrat))*$bot,4);

				$ymax[$c]=$v;
				$c++;
				$mak=max($ymax);
				$min=min($ymax);	
		}

		$i++;




	}
}
$nomor=1;
foreach(@$_SESSION['dplus'] as $key=>$dxmin){
	#ubah ke nol hasil akhir
	 $nilaid=0; 
	$nilaiPre=0;     
	$nilai=0;    
		
		$jarakm=$_SESSION['dmin'][$key];
		$id_alt=$_SESSION['id_alt'][$key];
		$this->db->select('*')
		->from('alternatif')
		->where('id_alternatif=',$id_alt);
		$query4 = $this->db->get()->result();
		//nilai bobot input
		foreach($query4 as $row5){
			$nm=$row5->nama_gedung;
		
		}
		$nilaiPre=$dxmin+$jarakm;
    
		$nilaid=$jarakm/$nilaiPre;
		$nilai=round($nilaid,4);
		 $sql = "insert into ranking (id_alternatif,total) values('$id_alt','$nilai')";
        $query = $this->db->query($sql);
		echo "<tr>
	<td>$nomor</td>
	<td>$nm</td>
	<td>$nilai</td>
	</tr>";		
	$nomor++;
}
echo "</tr>";
		?>

			</tbody>
		</table>
	</div>
