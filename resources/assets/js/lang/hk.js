const m = { 
	confirm:'確定',
	cancel:'取消',
	createSuccess:'創建成功',
	createFail:'創建失敗',
	add:'添加',
	addSuccess:'添加成功',
	addFail:'添加失敗',
	edit:'修改',
	editSuccess:'修改成功',
	editFail:'修改失敗',
	del:'删除',
	delSuccess:'删除成功',
	delFail:'删除失敗',
	upload:'上傳',
	uploadSuccess:'上傳成功',
	uploadFail:'上傳失敗',
	resetImg:'重置圖片',
	resetImgMsg:'是否重置該圖片',
	unEditable:'不可編輯',
	loginTimeout:'登錄失效',
	pleaseChoose:'請選擇',
	filled:'(必填)',
	patch:'編輯',
	uneditable:'(不可編輯)',
	preview:'預覽',
	man:'男',
	woman:'女',
	noset:'未設置',
    login:{
        loginNameP:'手機號碼或郵箱帳號',
        loginpasswordP:'密碼',
        register:'立即註冊',
        login:'登入',
        loginErr:'帳號或密碼錯誤',
        formErr:'請填寫帳號密碼',
    },
    register:{
        username:'中文名',
		en_name:'英文名',
		phoneNumber:'手機號',
		smscode:'驗證碼',
		password:'密碼',
		repassword:'確認密碼',
		register:'註冊',
		toLogin:'已有帳號？立即登入',
		regSuccess:'註冊成功',
		passwordErr:'兩次密碼不一致！',
		contentErr:'請填寫完整資訊',
		codeMsg:'驗證碼已成功發送，請注意查收。',
		phoneErr:'請填寫手機區號和號碼',
		getCode:'獲取驗證碼',
		laveTime:'後重獲取',
    },
    links:{
    	project:'旅程',
    	projectDetail:'旅程詳情',
    },
    home:{
    	addNewPro:'新建旅程',
    	notProgress:'未出行',
    	progressing:'進行中',
    	end:'已結束',
    	travel_name:'旅程名稱',
		travel_at:'出行日期',
		travel_return:'回程日期',
		travel_introduction:'旅程簡介',
		confirmAddMsg:'新建旅程將會消耗您一枚金幣，是否創建？',
		coinShort:'您的金幣不足',
		delPro:'删除旅程',
		confirmDelMsg:'是否删除該旅程',
    },
	projectDetail:{
		setting:'基本資料',
		databank:'資料庫',
		students:'團員信息',
	},
	students:{
		searchP:'請輸入想查找的ID',
		id:'用戶ID',
		original_password:'團員密碼',
		name:'團員中文名',
		en_name:'團員英文名',
		code:'電話區號',
		phone:'聯繫電話',
		code_one:'區號A',
		emergency_phone_one:'緊急電話A',
		code_two:'區號B',
		emergency_phone_two:'緊急電話B',
		emergency_email_one:'緊急郵箱A',
		emergency_email_two:'緊急郵箱B',
		student_number:'團員學號',
		class:'團員班級',
		group:'團員分組號',
		duty:'團員職責',
		useIdErr:'請輸入正確的用戶ID',
		confirmDelMsg:'是否删除該團員資訊',
	},
	linkSchool:{
		school_name:'學校名稱',
		travel_status:'旅程進行狀態',
		image:'背景圖',
	},
	personal:{
		laveCoin:'您的剩餘金幣',
		recharge:'充值',
		basicInfo:'基本資料',
		avatar:'頭像',
		name:'中文名',
		en_name:'英文名',
		sex:'性別',
		personalInfo:'個人資訊',
		phone:'手機號',
		email:'郵箱',
		oldCode:'舊區號',
		oldPhone:'舊手機號',
		phoneCode:'驗證碼',
		newCode:'區號',
		newPhone:'新手機號',
		newEmail:'新郵箱',
		oldPhoneErr:'號碼資訊不全',
		newPhoneErr:'請輸入手機號碼',
		codeErr:'請輸入驗證碼',
		newEmailErr:'請填寫郵箱',
		systemInfo:'系統消息',
		msgDetail:'消息詳情',
		newPassword:'新密碼',
		confirmPassword:'確認密碼',
		confirmPsdErr:'兩次密碼不一致！',
		formErr:'請填寫完整資訊',
	},
	dataBankInfo:{
		gather:'集合解散',
		flight:'班機往返',
		accommodationInfo:'住宿資料',
		leaderTeacher:'領隊老師',
		heavyWeather:'惡劣天氣安排',
		assembly:'集合',
		dissolution:'解散',
		assembly_at:'日期及時間',
		assembly_station:'詳細地址',
		go:'出發',
		return:'返回',
		flight:'航班信息',
		date:'日期',
		takeoff_time:'出發時間',
		arrival_time:'到達時間',
		from:'出發城市',
		to:'到達城市',
		from_flight:'出發站點',
		to_flight:'到達站點',
		hotel_name:'住宿名稱',
		check_at:'入住時間',
		leave_at:'離開時間',
		times:'入住天數',
		hotel_phone:'聯繫電話',
		hotel_address:'住宿地址',
		hotel_location:'住宿經緯度',
		location:'(經度,緯度)',
		image:'住宿圖片',
		leader:'老師姓名',
		area_code:'區號',
		phone:'老師電話',
		duty:'職責',
		urgency:'安排',
		delFlight:'删除航班',
		confirmDelFlight:'是否删除該航班',
		delHotel:'删除住宿',
		confirmDelHotel:'是否删除該住宿',
		delLeader:'删除領隊',
		confirmDelLeader:'是否删除該領隊',
	},
	dataBankPhone:{
		name:'聯繫人名稱',
		duty:'職責',
		area_code:'電話區號',
		phone:'聯繫電話',
		delPhone:'删除聯繫人',
		confirmDelPhone:'是否删除該聯繫人',
	},
	dataBankRules:{
		rule:'團員守則',
		noRule:'暫無團員守則',
	},
	promise:{
		promiseTitle:'承諾書',
		promise:'承諾',
		delPromise:'删除承諾',
		confirmDelPromise:'是否删除該承諾',
	},
	dataBankHouseTable:{
		group:'分組編號',
		room:'房間編號',
		class:'班級',
		name:'中文名',
		en_name:'英文名',
		duty:'職責',
		delHouseTable:'删除分組分房表資訊',
		confirmDelHouseTable:'是否删除該條分組分房表資訊和該團員資訊',
	},
	journey:{
		view_plan:'景點安排',
		meal_plan:'膳食安排',
	},
	dataBankStudy:{
		day:'景點',
		date:'日期',
		delStudy:'删除行程',
		confirmDelStudy:'是否删除該行程',
	},
	dataBankStudySheet:{
		studySheet:'學習工作紙',
		title:'標題',
		body:'内容',
		delstudySheet:'删除學習工作紙',
		confirmDelstudySheet:'是否删除該學習工作紙',
	},
	dataBankStudySheetInfo:{
		question:'問題',
		questionP:'暫未添加任何問題，請添加',
		delQuestion:'删除問題',
		confirmDelQuestion:'是否删除該問題',
	},
	dataBankLocalCulture:{
		content:'内容',
	},
	dataBankLuggageList:{
		rule_category_name:'行李清單',
		delLuggage:'删除清單',
		confirmDelLuggage:'是否删除該清單',
	},
	dataBankLuggageListInfo:{
		number:'編號',
		content:'裝備內容',
		delContent:'删除装备詳情',
		confirmDelContent:'是否删除該装备詳情',
	},
	dataBankEvaluation:{
		title:'題目標題',
		delTitle:'删除題目標題',
		confirmDelTitle:'是否删除該題目標題',
	},
	dataBankEvaluationInfo:{
		title:'題目',
		type:'題目類型',
		content:'題目詳情',
		type1:'1(一個選項)',
		type2:'2(兩個選項)',
		type3:'3(五個選項)',
		delTitle:'删除題目',
		confirmDelTitle:'是否删除該題目',
	},
	dataBankSelfPerception:{
		title:'感想標題',
		delTitle:'删除感想標題',
		confirmDelTitle:'是否删除該感想標題',
	},
	dataBankAnswerList:{
		studentList:'學生名單',
		group:'分組',
		student_number:'學生學號',
		class:'學生班級',
		name:'中文名',
		en_name:'英文名',
		duty:'學生職責',
		view:'查看答題紙',
	},
	dataBankAnswerInfo:{
		title1:'學習工作紙',
		title2:'自我評估',
		title3:'自我感想',
		noAnswer:'暫無回答',
		noQuestion:'未設定問題',
		noImage:'未上傳圖片',
	},
	areacode:{
		sel:'請選擇區號',
	},
	head:{
		coin:'金幣',
		logout:'登出',
		confirmMsg:'是否登出',
	},
	commonLeft:{
		dataBankInfo:'重要資料',
		dataBankPhone:'常用電話',
		rule:'團員守則',
		promise:'我的承諾',
		dataBankLocalCulture:'當地文化',
		dataBankHouseTable:'分組分房表',
		luggage:'行李清單',
		journey:'行程',
		study:'學習工作紙',
		topic:'自我評估',
		dataBankSelfPerception:'自我感想',
		answer:'學生答題紙',
	}
};
export default m;