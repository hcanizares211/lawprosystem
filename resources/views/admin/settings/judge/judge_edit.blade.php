<div class="modal fade" id="addtag" role="dialog" aria-labelledby="addcategory" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <style>
            /* Scoped edit modal styles for Judge */
            #addtag .modal-dialog { max-width: 680px; width: 90%; }
            #addtag .modal-content { border-radius: 8px; overflow: hidden; }
            #addtag .modal-header { padding: 14px 18px; border-bottom: 1px solid #e6e9ee; background: #fff; }
            #addtag .modal-title { color: #2c3e50; font-weight: 600; margin: 0; }
            #addtag .modal-body { padding: 18px; }
            #addtag .modal-footer { padding: 12px 18px; border-top: 1px solid #e6e9ee; }
            #addtag .form-control { height: 42px; border-radius: 4px; }
            #addtag .btn-success { background: linear-gradient(135deg,#26a69a 0%,#00897b 100%); border-color: #00897b; color: #fff; }
            #addtag .btn-danger { background: #d9534f; border-color: #d43f3a; color: #fff; }
            @media (max-width: 480px) { #addtag .modal-dialog { width: 95%; } }
        </style>

        <form action="{{ route('judge.update', $judge->id) }}" method="POST" id="tagForm" name="tagForm">
            @csrf()
            <input type="hidden" id="id" name="id" value="{{ $judge->id ?? '' }}">

            @method('patch')
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">{{__('frontend.edit_judge')}}</h4>
                </div>


                <div class="modal-body">
                    <div id="form-errors"></div>
                    <div class="row">


                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label for="case_subtype">{{__('frontend.judge')}} <span class="text-danger">*</span></label>
                            <input type="text" placeholder="" class="form-control" id="judge_name" name="judge_name"
                                value="{{ $judge->judge_name ?? '' }}">
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="ik ik-x"></i>{{__('frontend.close')}}
                    </button>
                    <button type="submit" class="btn btn-success shadow"><i class="fa fa-save   ik ik-check-circle"
                            id="cl">
                        </i> {{__('frontend.save')}}
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>


<input type="hidden" name="token-value" id="token-value" value="{{ csrf_token() }}">

<input type="hidden" name="common_check_exist" id="common_check_exist" value="{{ url('common_check_exist') }}">

<script src="{{ asset('assets/js/settings/judge-validation.js') }}"></script>
