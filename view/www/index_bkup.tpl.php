<?php require(dirname(__FILE__) . '/_header.tpl.php'); ?>
<div class="container">
    <!-- Jumbotron -->
    <div class="row">
        <div class='span8'>
            <h3>The Criteria</h3>
            <p class="lead">
            Welcome to myentrepreneurnet.com where you will be connected with every likeminded entrepreneur in the city.
            </p>
            <p>
            Maintaining the quality and values of the community is important to us. Being and entrepreneur is cool let's keep it that way.
            </p>
            These are the basic guidelines you must agree to before going any further.
            </p>

            <!--a class="btn btn-large btn-success" href="#">Get started today</a-->
        </div>
        <div class='span4 offset0'>
            <iframe width="400" height="225" src="http://www.youtube.com/embed/j_0CcNEtS_w" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class='row'>
        <div class='span6'>
            <div class='well'>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <h3>
                                    Network Values
                                </h3>
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <ol>
                                    <li>Help others to make a difference</li>
                                    <li>Trust yourself and think big</li>
                                    <li>Don't be afraid to fail</li>
                                    <li>Break the rules (but not these ones)</li>
                                    <li>Ask for help</li>
                                    <li>If somebody reaches out to you, help them</li>
                                    <li>Learn from others around you at every opportunity</li>
                                    <li>Everything was impossible once don't listen to Naysayers</li>
                                    <li>Strictly NO (self) promoting to other members</li>
                                    <li>Check your ego when you log in</li>
                                </ol>
                                <p>
                                    Invite someone that you know will bring value to, and get value from the network.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class='span6'>
                    <p class=''>
                        I am a(n) <?php  $this->arrExtraFields['ROLL']->Render(); ?> new entrepreneur, business owner, successful entrepreneur/potential mentor, angle investor,
                    </p>

                    <p class=''>
                        Looking to meet <?php  $this->arrExtraFields['LOOKING']->Render(); ?> potential partner, other cool entrepreneurs, a mastermind group, a mentor, angel investors

                    </p>

                    <p class=''>
                        In <?php  $this->arrExtraFields['CITY']->Render(); ?> cities in the US, Cities in the UK,

                    </p>
                    <?php $this->txtEmail->Render(); ?>
                    <?php $this->RenderSignUpButton(); ?>
                </div>


            </div>
        </div>
    </div>
</div> <!-- /container -->
<?php require(dirname(__FILE__) . '/_footer.tpl.php'); ?>