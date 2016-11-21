<div class="container top">

    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <?php echo ucfirst($this->uri->segment(2)); ?>
        </li>
    </ul>
    <div class="col-md-12">
        <div class="jumbotron">
            <h2>
                Create your order here.
            </h2>
            <p>
                Please input the specifications of the cabinet you want.
            </p>
        </div>
        <form role="form" class="form-inline">
            <div class="form-group">

                <label for="Width">
                    Width
                </label>
                <input type="text" class="form-control" id="widthText" />
            </div>
            <div class="form-group">

                <label for="Height">
                    Height
                </label>
                <input type="text" class="form-control" id="heightText" />
            </div>
            <div class="form-group">

                <label for="Depth">
                    Depth
                </label>
                <input type="text" class="form-control" id="depthText" />
            </div>
            <div class="form-group">

                <label for="Hinges">
                    Number of Hinges
                </label>
                <input type="text" class="form-control" id="hingesText" />
            </div>
            <div class="form-group">

                <label for="Doors">
                    Number of Doors
                </label>
                <input type="text" class="form-control" id="doorsText" />
            </div>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">Finish Left</a>
                </li>
                <li class="disabled">
                    <a href="#">Finish Right</a>
                </li>
            </ul>
            <button type="submit" class="btn btn-default">
                Submit
            </button>
        </form>
    </div>

</div>