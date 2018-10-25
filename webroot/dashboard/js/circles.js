 

    var e = $("#circles-1").attr("data-value"),
					t = Circles.create({
						id: 'circles-1',
						radius: 110,
						value: e,
						maxValue: 100,
						width: 13,
						text: function(e) {
							return e + "<span>%</span>"
						},
						colors: ["white", "red"],
						duration: 600,
						wrpClass: 'circles-wrp',
						textClass: 'circles-text',
						valueStrokeClass: 'circles-valueStroke',
						maxValueStrokeClass: 'circles-maxValueStroke',
						styleWrapper: true,

					});
                                    
                                    
                                        var e = $("#circles-2").attr("data-value"),
					t = Circles.create({
						id: 'circles-2',
						radius: 110,
						value: e,
						maxValue: 100,
						width: 13,
						text: function(e) {
							return e + "<span>%</span>"
						},
						colors: ["white", "#85c976"],
						duration: 600,
						wrpClass: 'circles-wrp',
						textClass: 'circles-text',
						valueStrokeClass: 'circles-valueStroke',
						maxValueStrokeClass: 'circles-maxValueStroke',
						styleWrapper: true,

					});
                              
 