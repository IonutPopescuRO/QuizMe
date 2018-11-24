<?php

class paginate
{
	private $db;
	
	public function __construct()
	{
		global $host, $user, $password;
		$database = new Database();
		$db = $database->dbConnection($host, "player", $user, $password);
		$this->db = $db;
    }
	
	public function dataview($query, $search=NULL, $categories, $difficulty, $edit)
	{
		global $site_url;
		
		$stmt = $this->db->prepare($query);

		if($search && $search[0]!='*')
		{
			$search = str_replace(' ', '', $search[0]);
			$stmt->bindValue(':search', '%'.$search[0].'%');
		}
		$stmt->execute();

		$rowCount = count($stmt->fetchAll());
		
		$stmt = $this->db->prepare($query);
		if($search && $search[0]!='*')
			$stmt->bindValue(':search', '%'.$search[0].'%');
		$stmt->execute();
		
		$number=0;
		
		if(isset($_GET["page_no"]))
		{
			if(is_numeric($_GET["page_no"]))
			{
				if($_GET["page_no"]>1)
					$number = ($_GET["page_no"]-1)*10;
			}
		}
		if($rowCount>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{	$number++;
				
				?>
			<tr>
				<th scope="row"><?php print $number; ?></th>
				<th><?php print substr($row['question'], 0, 60);; ?></th>
				<th><?php print $categories[$row['category']]; ?></th>
				<th><?php print $difficulty[$row['difficulty']]; ?></th>
				<th><?php print $row['date']; ?></th>

			</tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			if(is_numeric($_GET["page_no"]))
				if($_GET["page_no"]>1)
					$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page,$first,$last,$self,$search=NULL)
	{		
		$self = $self.'app/questions/';
		
		$sql = "SELECT count(*) ".strstr($query, 'FROM');
		
		$stmt = $this->db->prepare($sql);
		if($search && $search[0]!='*')
		{
			$search = str_replace(' ', '', $search[0]);
			$stmt->bindValue(':search', '%'.$search[0].'%');
		}
		$stmt->execute(); 
		
		$total_no_of_records = $stmt->fetchColumn();
		
		if($total_no_of_records > 0)
		{
			?><center><nav style="margin-left: 10px;"><ul class="pagination pagination-sm"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				if(is_numeric($_GET["page_no"]))
				{
					$current_page=$_GET["page_no"];
					
					if($_GET["page_no"]<1)
						print "<script>top.location='".$self."'</script>";
					else if($_GET["page_no"]>$total_no_of_pages)
						print "<script>top.location='".$self."'</script>";
				}
			}
			$search = $search[0]."/".$search[1]."/".$search[2];
			if($current_page!=1)
			{
				$previous = $current_page-1;
				if($search)
				{
					print "<li class='page-item'><a class='page-link' href='".$self."1/".$search."'>".$first."</a></li>";
					print "<li class='page-item'><a class='page-link' href='".$self.$previous."/".$search."'>&laquo;</a></li>";
				}
				else
				{
					print "<li class='page-item'><a class='page-link' href='".$self."1'>".$first."</a></li>";
					print "<li class='page-item'><a class='page-link' href='".$self.$previous."'>&laquo;</a></li>";
				}
			}
			
			$x=$current_page;

			if($current_page+3>$total_no_of_pages)
				if($total_no_of_pages-3>0)
					$x=$total_no_of_pages-3;
				else if($total_no_of_pages-2>0)
					$x=$total_no_of_pages-2;
				else if($total_no_of_pages-1>0)
					$x=$total_no_of_pages-1;
			
			for($i=$x;$i<=$x+3;$i++)
				if($i==$current_page)
				{
					if($search)
						print "<li class='page-item active'><a class='page-link' href='".$self.$i."/".$search."'>".$i."</a></li>";
					else
						print "<li class='page-item active'><a class='page-link' href='".$self.$i."'>".$i."</a></li>";
				}
				else if($i>$total_no_of_pages)
					break;
				else
				{
					if($search)
						print "<li class='page-item'><a class='page-link' href='".$self.$i."/".$search."'>".$i."</a></li>";
					else
						print "<li class='page-item'><a class='page-link' href='".$self.$i."'>".$i."</a></li>";
				}
			
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				if($search)
					print "<li class='page-item'><a class='page-link' href='".$self.$next."/".$search."'>&raquo;</a></li>";
				else
					print "<li class='page-item'><a class='page-link' href='".$self.$next."'>&raquo;</a></li>";
			}
			?></ul></nav></center><?php
		}
	}
}