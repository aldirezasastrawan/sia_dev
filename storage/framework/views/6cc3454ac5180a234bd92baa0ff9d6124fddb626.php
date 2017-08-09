<?php $__env->startSection('content'); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center><font color="black" size="5">REGISTERASI PENGGUNA SISTEM</font><center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url(action('RegisterController@postRegister'))); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                            <label for="inputEmail" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input type="text" name="username" class="form-control" placeholder="Input Username" required autofocus>
                                
                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="inputEmail" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" name="nama" class="form-control" placeholder="Input Name" required autofocus>
                                
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="inputEmail" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Input Email address" required autofocus>
                                
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="inputEmail" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="text" name="password" class="form-control" placeholder="Input Password" required autofocus>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('level') ? ' has-error' : ''); ?>">
                            <label for="level" class="col-md-4 control-label">Level</label>

                            <div class="col-md-6">
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <select name="value" id="value" class="form-control">
                                      <?php foreach($rolelist as $role): ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->namaRule); ?></option>
                                      <?php endforeach; ?>
                                    </select>

                                <?php if($errors->has('level')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('level')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>