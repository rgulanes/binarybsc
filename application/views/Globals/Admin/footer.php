    <!-- Modal -->
    <div class="modal fade" id="viewMessages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="top: 20px;">
        <div class="modal-dialog" style="width: 65%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-fw"></i></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-envelope-o fa-fw"></i> <span>Messages</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="padding: 15px 0px;">
                                        <div class="col-lg-12">
                                            <span class="pull-left"><i class="fa fa-envelope fa-fw"></i> Internal Messages</span>
                                        </div>
                                        <div class="col-lg-12" id="email-tree"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row hide" id="emailTree-content">
                                            <input type="hidden" name="feedback_id" />
                                            <div class="col-lg-4">
                                                <div class="form-group pull-left">
                                                    <a class="btn btn-outline btn-success btn-xs mouse-over return-inbox"><i class="fa fa-arrow-left fa-fw"></i> Back</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group pull-right">
                                                    <a class="btn btn-outline btn-primary btn-xs mouse-over unarchive-message hide"><i class="fa fa-upload fa-fw"></i> Unarchive Message</a>
                                                    <a class="btn btn-outline btn-info btn-xs mouse-over archive-message"><i class="fa fa-archive fa-fw"></i> Archive Message</a>
                                                    <a class="btn btn-outline btn-danger btn-xs mouse-over delete-message"><i class="fa fa-trash fa-fw"></i> Delete Message</a>
                                                    <a class="btn btn-outline btn-success btn-xs mouse-over restore-message hide"><i class="fa fa-refresh fa-fw"></i> Restore Message</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user-circle fa-fw"></i></span>
                                                    <label class="sender form-control" style="font-weight: normal;"></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope-square fa-fw"></i></span>
                                                    <label class="sender_email form-control" style="font-weight: normal;"></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                                    <label class="sender_timestamp form-control" style="font-weight: normal;"></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label><i class="fa fa-comments-o fa-fw"></i> MESSAGE</label>
                                                </div>
                                                <div class="form-group">
                                                    <textarea rows="5" class="form-control" name="sender_feedback" readonly="readonly"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="emailTree-inbox" style="font-size: 10px;">
                                            <div class="col-lg-12">
                                                <table id="emailReceivedTable" class="table table-condensed table-bordered table-hover" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>&nbsp;</th>
                                                            <th>Email Address</th>
                                                            <th>Date Received</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>