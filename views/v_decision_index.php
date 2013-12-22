<div id="wrapper">
    <h4 id="table_title">Decision trees</h4>

    <div class="table" >
                <table >


    <?php foreach($trees as $tree): ?>
                    <tr>
                        <td class="name">

    <!-- Print this user's name -->
    <a href=<?php echo "'/decision/tree/".$tree['tree_name']."'" ?>><?php echo $tree['title']?></a>

                        </td>
                        <td class="link">

    <!-- If there exists a connection with this user, show a unfollow link -->
    
       					<label><?php echo $tree['username']?></label>
                    
                        </td>
                    </tr>
    
    <?php endforeach; ?>
                
                </table>
</div>
            