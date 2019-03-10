<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (

	'password' => array (
		array(
		        'field' => 'cp',
		        'label' => 'current password',
		        'rules' => 'required|callback_oldpass'
			),
		array(
		        'field' => 'np',
		        'label' => 'new password',
		        'rules' => 'required|min_length[8]|callback_newpass'
			),
		array(
		        'field' => 'cnp',
		        'label' => 'confirm password',
		        'rules' => 'required|matches[np]'
			),
	),
	'session' => array (
		array(
		        'field' => 'session',
		        'label' => 'Session',
		        'rules' => 'required|is_unique[sessions.sessions]'
			),
		array(
		        'field' => 'year',
		        'label' => 'Session Year',
		        'rules' => 'required|is_unique[sessions.year]'
			)
	),
	'editsession' => array (
		array(
		        'field' => 'session',
		        'label' => 'Session',
		        'rules' => 'required'
			),
		array(
		        'field' => 'year',
		        'label' => 'Session Year',
		        'rules' => 'required'
			)
	),
	'payment' => array (
		array(
		        'field' => 'id',
		        'label' => 'Student ID',
		        'rules' => 'required|callback_validstudent'
			)
	),
	'addpayment' => array (
		array(
		        'field' => 'sid',
		        'label' => 'Student ID',
		        'rules' => 'required'
			),
		array(
		        'field' => 'name',
		        'label' => '',
		        'rules' => ''
			),
		array(
		        'field' => 'class',
		        'label' => '',
		        'rules' => ''
			),
		array(
		        'field' => 'balance',
		        'label' => '',
		        'rules' => ''
			),
		
		array(
		        'field' => 'amount',
		        'label' => 'amount',
		        'rules' => 'required|is_natural'
			),
		array(
		        'field' => 'method',
		        'label' => 'Method',
		        'rules' => 'required'
			),
		array(
		        'field' => 'sessionid',
		        'label' => 'Session',
		        'rules' => 'required'
			),
	),
	'setmassfee' => array (
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
			),
		array(
		        'field' => 'title',
		        'label' => 'Title',
		        'rules' => 'required'
			),
		array(
		        'field' => 'type',
		        'label' => 'Type',
		        'rules' => 'required'
			),
		array(
		        'field' => 'amount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'editmonthlyfee' => array (
		
		array(
		        'field' => 'eamount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'monthlyfee' => array (
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required|is_unique[monthlyfees.classid]'
			),
		array(
		        'field' => 'amount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'setsinglefee' => array (
		array(
		        'field' => 'sid',
		        'label' => 'Student ID',
		        'rules' => 'required|callback_validstudent'
			),
		array(
		        'field' => 'stitle',
		        'label' => 'Title',
		        'rules' => 'required'
			),
		
		array(
		        'field' => 'samount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'editfee' => array (
		
		array(
		        'field' => 'etitle',
		        'label' => 'Title',
		        'rules' => 'required'
			),
		
		array(
		        'field' => 'eamount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'admissionfee' => array (
		array(
		        'field' => 'title',
		        'label' => 'Title',
		        'rules' => 'required|is_unique[admissionfee.title]'
			),
		array(
		        'field' => 'type',
		        'label' => 'Type',
		        'rules' => 'required'
			),
		array(
		        'field' => 'amount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'expense' => array (
		array(
		        'field' => 'title',
		        'label' => 'Title',
		        'rules' => 'required'
			),
		
		array(
		        'field' => 'amount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'editadmissionfee' => array (
		array(
		        'field' => 'etitle',
		        'label' => 'Title',
		        'rules' => 'required'
			),
		array(
		        'field' => 'eamount',
		        'label' => 'Amount',
		        'rules' => 'required|is_natural'
			),
	),
	'designation' => array (
		array(
		        'field' => 'designation',
		        'label' => 'designation',
		        'rules' => 'required|is_unique[designation.designation]'
			)
	),
	'myschool' => array (
		array(
		        'field' => 'name',
		        'label' => 'School Name',
		        'rules' => 'required'
			),
		array(
		        'field' => 'sname',
		        'label' => 'School Short Name',
		        'rules' => 'required|max_length[7]'
			),
		array(
		        'field' => 'since',
		        'label' => 'Since',
		        'rules' => 'exact_length[4]|is_natural'
			),
		array(
		        'field' => 'title',
		        'label' => '',
		        'rules' => ''
			),
		array(
		        'field' => 'contact',
		        'label' => '',
		        'rules' => ''
			),
		array(
		        'field' => 'address',
		        'label' => '',
		        'rules' => ''
			),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'valid_email'
		    ),
		array(
		        'field' => 'logo',
		        'label' => 'logo',
		        'rules' => 'callback_logoValidation'
		    )
	),
	'syllebus' => array (
		
		array(
		        'field' => 'title',
		        'label' => 'Title',
		        'rules' => 'required'
			),
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
			),
		
		array(
		        'field' => 'fileup',
		        'label' => 'Syllebus',
		        'rules' => 'callback_fileupload'
		    )
	),
	'notice' => array (
		
		array(
		        'field' => 'title',
		        'label' => 'Title',
		        'rules' => 'required'
			),
		array(
		        'field' => 'notice',
		        'label' => 'Notice',
		        'rules' => 'required'
			)
	),
	'addclassteacher' => array (
		
		array(
		        'field' => 'secid',
		        'label' => 'Section',
		        'rules' => 'required|is_unique[classteacher.secid]'
			),
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
			),
		
		array(
		        'field' => 'eid',
		        'label' => 'Teacher',
		        'rules' => 'required|is_unique[classteacher.eid]'
			)
	),
	'editclassteacher' => array (
		
		array(
		        'field' => 'eid',
		        'label' => 'Teacher',
		        'rules' => 'required|is_unique[classteacher.eid]'
			)
	),
	'editsyllebus' => array (
		
		array(
		        'field' => 'fileup',
		        'label' => 'Syllebus',
		        'rules' => 'callback_fileupload'
		    )
	),
	'term' => array (
		
		array(
		        'field' => 'term',
		        'label' => 'Term',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'contribution',
		        'label' => 'Contribution',
		        'rules' => 'required|is_natural'
		    )
		
	),
	'exam' => array (
		
		array(
		        'field' => 'exam',
		        'label' => 'Exam',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'termid',
		        'label' => 'Term',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'mark',
		        'label' => 'Mark',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'con',
		        'label' => 'Contribution',
		        'rules' => 'required|is_natural'
		    )
		
	),
	'editexam' => array (
		
		array(
		        'field' => 'exam',
		        'label' => 'Exam',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'mark',
		        'label' => 'Mark',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'contribution',
		        'label' => 'Contribution',
		        'rules' => 'required|is_natural'
		    )
		
	),
	'examroutine' => array (
		
		array(
		        'field' => 'date',
		        'label' => 'Date',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'hour',
		        'label' => 'Time',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'examid',
		        'label' => 'Exam',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
		    ),array(
		        'field' => 'subjectcode',
		        'label' => 'Subject',
		        'rules' => 'required'
		    )
		
	),
	'grade' => array (
		
		array(
		        'field' => 'grade',
		        'label' => 'Grade',
		        'rules' => 'required|max_length[2]'
		    ),
		array(
		        'field' => 'gradepoint',
		        'label' => 'Grade Point',
		        'rules' => 'required|callback_gradepointValidation'
		    ),
		array(
		        'field' => 'gradepointto',
		        'label' => 'Grade Point',
		        'rules' => 'required|callback_gradepointValidation'
		    ),
		array(
		        'field' => 'comment',
		        'label' => 'Comment',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'mf',
		        'label' => 'Marks From',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'mt',
		        'label' => 'Marks to',
		        'rules' => 'required|is_natural'
		    )
		
	),
	
	'employee' => array (
		array(
		        'field' => 'eid',
		        'label' => 'ID',
		        'rules' => 'required|max_length[16]|callback_idValidation|is_unique[employee.eid]'
			),
		array(
		        'field' => 'name',
		        'label' => 'Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'designation',
		        'label' => 'Designaton',
		        'rules' => 'required'
			),
		array(
		        'field' => 'gender',
		        'label' => 'Gender',
		        'rules' => 'required'
			),
		array(
		        'field' => 'dob',
		        'label' => 'Birthdate',
		        'rules' => 'required|callback_dobValidation'
			),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'required|valid_email|is_unique[employee.email]'
			),
		array(
		        'field' => 'phone',
		        'label' => 'Phone',
		        'rules' => 'required|max_length[11]|is_natural|is_unique[employee.phone]'
			),
		array(
		        'field' => 'nid',
		        'label' => 'NID',
		        'rules' => 'required|max_length[17]|is_unique[employee.nid]'
		    ),
		array(
		        'field' => 'qualification',
		        'label' => 'qualification',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'access',
		        'label' => 'Access Type',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'photo',
		        'label' => 'Photo',
		        'rules' => 'callback_photoValidation'
		    )
	),
	
	'editemployee' => array (
		array(
		        'field' => 'name',
		        'label' => 'Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'gender',
		        'label' => 'Gender',
		        'rules' => 'required'
			),
		array(
		        'field' => 'dob',
		        'label' => 'Birthdate',
		        'rules' => 'required|callback_dobValidation'
			),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'required|valid_email'
			),
		array(
		        'field' => 'phone',
		        'label' => 'Phone',
		        'rules' => 'required|max_length[11]|is_natural'
			),
		array(
		        'field' => 'nid',
		        'label' => 'NID',
		        'rules' => 'required|max_length[17]'
		    ),
		array(
		        'field' => 'qualification',
		        'label' => 'qualification',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'photo',
		        'label' => 'Photo',
		        'rules' => 'callback_photoeditValidation'
		    )
	),
	'addclass' => array (
		
		array(
		        'field' => 'classname',
		        'label' => 'Class Name',
		        'rules' => 'required|is_unique[class.classname]'
		    )
		
	),
	'editclass' => array (
		
		array(
		        'field' => 'classname',
		        'label' => 'Class Name',
		        'rules' => 'required|is_unique[class.classname]'
		    )
		
	),
	'addsec' => array (
		
		array(
		        'field' => 'alphaname',
		        'label' => 'Alpha Name',
		        'rules' => 'required|max_length[2]|alpha|callback_secValidation'
		    ),
		array(
		        'field' => 'name',
		        'label' => 'Nick Name',
		        'rules' => 'alpha'
		    ),
		array(
		        'field' => 'limit',
		        'label' => 'Seat Limit',
		        'rules' => 'required|is_natural'
		    ),	
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
		    )
		
	),
	'editsec' => array (
		
		array(
		        'field' => 'alphaname',
		        'label' => 'Alpha Name',
		        'rules' => 'required|max_length[2]|alpha'
		    ),
		array(
		        'field' => 'limit',
		        'label' => 'Seat Limit',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'name',
		        'label' => 'Nick Name',
		        'rules' => 'alpha'
		    )
	),
	'period' => array (
		
		array(
		        'field' => 'stime',
		        'label' => 'Start Time',
		        'rules' => 'required|exact_length[5]'
		    ),
		array(
		        'field' => 'cd',
		        'label' => 'Class Duration',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'ad',
		        'label' => 'Assembly Duration',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'td',
		        'label' => 'Tiffin Duration',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'bt',
		        'label' => 'before tiffin',
		        'rules' => 'required|is_natural'
		    ),
		array(
		        'field' => 'at',
		        'label' => 'after tiffin',
		        'rules' => 'required|is_natural'
		    )
	),
	'subject' => array (
		
		array(
		        'field' => 'subjectcode',
		        'label' => 'Subject code',
		        'rules' => 'required|is_unique[subject.subjectcode]'
		    ),
		array(
		        'field' => 'subjectname',
		        'label' => 'Subject Name',
		        'rules' => 'required|is_unique[subject.subjectname]'
		    )
		
	),
	'editsubject' => array (
		
		array(
		        'field' => 'subjectname',
		        'label' => 'Subject Name',
		        'rules' => 'required|is_unique[subject.subjectname]'
		    )
		
	),
	'asignsubject' => array (
		
		array(
		        'field' => 'classid',
		        'label' => 'Class ID',
		        'rules' => 'required'
		    )
		
	),
	'addclassroutine' => array (
		
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'section',
		        'label' => 'Section',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'subject',
		        'label' => 'subject',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'day',
		        'label' => 'Day',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'period',
		        'label' => 'Period',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'teacher',
		        'label' => 'Teacher',
		        'rules' => 'required'
		    )
		
	),
	
	'studentadd' => array (
		array(
		        'field' => 'sid',
		        'label' => 'Student ID',
		        'rules' => 'required|max_length[16]|callback_sidValidation|is_unique[studentinfo.sid]'
			),
		array(
		        'field' => 'sname',
		        'label' => 'Student Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
			),
		array(
		        'field' => 'secid',
		        'label' => 'Section',
		        'rules' => 'required'
			),
		array(
		        'field' => 'sphoto',
		        'label' => 'Photo',
		        'rules' => 'callback_photoValidation'
		    ),
		array(
		        'field' => 'dob',
		        'label' => 'Birthdate',
		        'rules' => 'required|callback_dobValidation'
			),
		array(
		        'field' => 'semail',
		        'label' => 'Student Email',
		        'rules' => 'valid_email|is_unique[studentinfo.studentemail]'
			),
		array(
		        'field' => 'sphone',
		        'label' => 'Student Phone Number',
		        'rules' => 'max_length[11]|is_natural|is_unique[studentinfo.studentphone]'
			),
		array(
		        'field' => 'nationality',
		        'label' => 'Student Nationality',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'gender',
		        'label' => 'Student Gender',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'blood',
		        'label' => 'Student Blood Group',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'religion',
		        'label' => 'Student Religion',
		        'rules' => 'required'
		    )
	),
	'editstudentadd' => array (
		array(
		        'field' => 'sname',
		        'label' => 'Student Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'classid',
		        'label' => 'Class',
		        'rules' => 'required'
			),
		array(
		        'field' => 'secid',
		        'label' => 'Section',
		        'rules' => 'required'
			),
		array(
		        'field' => 'sphoto',
		        'label' => 'Photo',
		        'rules' => 'callback_photoeditValidation'
		    ),
		array(
		        'field' => 'dob',
		        'label' => 'Birthdate',
		        'rules' => 'required|callback_dobValidation'
			),
		array(
		        'field' => 'semail',
		        'label' => 'Student Email',
		        'rules' => 'valid_email'
			),
		array(
		        'field' => 'sphone',
		        'label' => 'Student Phone Number',
		        'rules' => 'max_length[11]|is_natural'
			),
		array(
		        'field' => 'nationality',
		        'label' => 'Student Nationality',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'gender',
		        'label' => 'Student Gender',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'blood',
		        'label' => 'Student Blood Group',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'religion',
		        'label' => 'Student Religion',
		        'rules' => 'required'
		    )
	),
	'editstudent' => array (
		array(
		        'field' => 'sname',
		        'label' => 'Student Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'sphoto',
		        'label' => 'Photo',
		        'rules' => 'callback_photoeditValidation'
		    ),
		array(
		        'field' => 'dob',
		        'label' => 'Birthdate',
		        'rules' => 'required|callback_dobValidation'
			),
		array(
		        'field' => 'semail',
		        'label' => 'Student Email',
		        'rules' => 'valid_email'
			),
		array(
		        'field' => 'sphone',
		        'label' => 'Student Phone Number',
		        'rules' => 'max_length[11]|is_natural'
			),
		array(
		        'field' => 'nationality',
		        'label' => 'Student Nationality',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'gender',
		        'label' => 'Student Gender',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'blood',
		        'label' => 'Student Blood Group',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'religion',
		        'label' => 'Student Religion',
		        'rules' => 'required'
		    )
	),
	'parentadd' => array (
		array(
		        'field' => 'fname',
		        'label' => 'Father Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'femail',
		        'label' => 'Father Email',
		        'rules' => 'valid_email'
			),
		array(
		        'field' => 'fphone',
		        'label' => 'Father Phone Number',
		        'rules' => 'required|max_length[11]|is_natural'
			),
		array(
		        'field' => 'fnid',
		        'label' => 'Father nid',
		        'rules' => ''
		    ),
		array(
		        'field' => 'fprofession',
		        'label' => 'Father Profession',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'fincome',
		        'label' => 'Father Income',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'mname',
		        'label' => 'Mother Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'memail',
		        'label' => 'Mother Email',
		        'rules' => 'valid_email'
			),
		array(
		        'field' => 'mphone',
		        'label' => 'Mother Phone Number',
		        'rules' => 'max_length[11]|is_natural'
			),
		array(
		        'field' => 'mnid',
		        'label' => 'Mother nid',
		        'rules' => ''
		    ),
		array(
		        'field' => 'mprofession',
		        'label' => 'Mother Profession',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'mincome',
		        'label' => 'Mother Income',
		        'rules' => ''
		    ),
		array(
		        'field' => 'lname',
		        'label' => 'Guardian Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'lemail',
		        'label' => 'Guardian Email',
		        'rules' => 'required|valid_email'
			),
		array(
		        'field' => 'lphone',
		        'label' => 'Guardian Phone Number',
		        'rules' => 'required|max_length[11]|is_natural'
			),
		array(
		        'field' => 'lnid',
		        'label' => 'Guardian nid',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'lprofession',
		        'label' => 'Guardian Profession',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'pid',
		        'label' => 'Parent ID',
		        'rules' => 'required|max_length[16]|callback_pidValidation|is_unique[user.username]'
			)
	),
	'editparentadd' => array (
		array(
		        'field' => 'fname',
		        'label' => 'Father Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'femail',
		        'label' => 'Father Email',
		        'rules' => 'valid_email'
			),
		array(
		        'field' => 'fphone',
		        'label' => 'Father Phone Number',
		        'rules' => 'required|max_length[11]|is_natural'
			),
		array(
		        'field' => 'fnid',
		        'label' => 'Father nid',
		        'rules' => ''
		    ),
		array(
		        'field' => 'fprofession',
		        'label' => 'Father Profession',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'fincome',
		        'label' => 'Father Income',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'mname',
		        'label' => 'Mother Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'memail',
		        'label' => 'Mother Email',
		        'rules' => 'valid_email'
			),
		array(
		        'field' => 'mphone',
		        'label' => 'Mother Phone Number',
		        'rules' => 'max_length[11]|is_natural'
			),
		array(
		        'field' => 'mnid',
		        'label' => 'Mother nid',
		        'rules' => ''
		    ),
		array(
		        'field' => 'mprofession',
		        'label' => 'Mother Profession',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'mincome',
		        'label' => 'Mother Income',
		        'rules' => ''
		    ),
		array(
		        'field' => 'lname',
		        'label' => 'Guardian Name',
		        'rules' => 'required|callback_nameValidation'
			),
		array(
		        'field' => 'lemail',
		        'label' => 'Guardian Email',
		        'rules' => 'required|valid_email'
			),
		array(
		        'field' => 'lphone',
		        'label' => 'Guardian Phone Number',
		        'rules' => 'required|max_length[11]|is_natural'
			),
		array(
		        'field' => 'lnid',
		        'label' => 'Guardian nid',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'lprofession',
		        'label' => 'Guardian Profession',
		        'rules' => 'required'
		    )
	),
	
	'addressadd' => array (
		
		array(
		        'field' => 'address',
		        'label' => 'Present Address',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'paddress',
		        'label' => 'Permanent Address',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'gaddress',
		        'label' => 'Guardian Address',
		        'rules' => 'required'
		    ),
	),
	
	
	
	
	'profile' => array (
		
		array(
		        'field' => 'phone',
		        'label' => 'Phone Number',
		        'rules' => 'required|min_length[11]|max_length[11]|numeric'
		    ),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'required|valid_email'
		    )
		
	),
	
	
);
