<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/default.min.css" rel="stylesheet">
</head>
@include('documentation.style')

<body>
    <nav id="navbar">
        <header>Documentation</header>
        <ul>
            <li><a class="nav-link" href="#started">Introduction</a></li>
            <li><a class="nav-link" href="#migration">Migration</a></li>
            <li><a class="nav-link" href="#validation">Validation</a></li>
            <li><a class="nav-link" href="#data_relation">Foregn Key</a></li>
            <li><a class="nav-link" href="#fild">Fild</a></li>
            <li><a class="nav-link" href="#relations">Relationship</a></li>
            <li><a class="nav-link" href="#for_Statement">Router Api</a></li>
            <li><a class="nav-link" href="#match_Statement">match Statement</a></li>
        </ul>
    </nav>
    <main id="main-doc">
        <section class="main-section" id="Introduction">
            <header>Introduction</header>
            <article>
                <p>Package untuk mempermudah pembuatan crud laravel</p>
            </article>
        </section>
        <br>
        @include('documentation.started')
        @include('documentation.migration_template')
        @include('documentation.validation')
        @include('documentation.relation')
        @include('documentation.fild')
        @include('documentation.relationship')
        {{-- @include('documentation.router_api') --}}
    </main>
    {{-- <script src="https://cdn.freecodecamp.org/testable-projects-fcc/v1/bundle.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
    <script>
        hljs.registerLanguage(
            "gdscript",
            function() {
                "use strict";
                var e = e || {};

                function r(e) {
                    return {
                        aliases: ["godot", "gdscript"],
                        keywords: {
                            //symbol: "( ) - > :",
                            keyword: "and in not or self void as assert breakpoint class class_name extends is func setget signal tool yield const enum export onready static var remote sync master puppet remotesync mastersync puppetsync Color8 ColorN abs asin assert atan atan2 bytes2var cartesian2polar ceil char clamp convert cos cosh db2linear decimals dectime deg2rad dict2inst ease exp floor fmod fposmod funcref get_stack hash inst2dict instance_from_id inverse_lerp is_equal_approx is_inf is_instance_valid is_nan is_zero_approx len lerp lerp_angle linear2db load log max min move_toward nearest_po2 ord parse_json polar2cartesian posmod pow preload print print_debug print_stack printerr printraw prints printt push_error push_warning rad2deg rand_range rand_seed randf randi randomize range range_lerp round seed sign sin sinh smoothstep sqrt step_decimals stepify str str2var tan tanh to_json type_exists typeof validate_json var2bytes var2str weakref wrapf wrapi yield PI TAU INF NAN int float true false null",
                            control_flow_keyword: "if elif else for match break continue while pass return",
                            base_type: "String Array Dictionary Vector2 Vector3 Rect2 PoolByteArray PoolColorArray PoolIntArray PoolRealArray PoolStringArray PoolVector2Array PoolVector3Array",
                            //engine_type: "ARVRServer AudioServer CameraServer ClassDB EditorFileSystemDirectory EditorNavigationMeshGenerator EditorSelection EditorVCSInterface Engine Geometry IP Input InputMap JNISingleton JSON JSONRPC JavaClassWrapper JavaScript MainLoop Marshalls Node OS Performance Physics2DDirectBodyState Physics2DDirectSpaceState Physics2DServer PhysicsDirectBodyState PhysicsDirectSpaceState PhysicsServer ProjectSettings Reference ResourceLoader ResourceSaver TranslationServer TreeItem UndoRedo VisualScriptEditor VisualServer MainLoop SceneTree AnimationPlayer AnimationTree AnimationTreePlayer AudioStreamPlayer CanvasItem CanvasLayer EditorFileSystem EditorInterface EditorPlugin EditorResourcePreview HTTPRequest InstancePlaceholder ResourcePreloader SkeletonIK Spatial Timer Tween Viewport WorldEnvironment Control BaseButton ColorRect Container GraphEdit ItemList Label LineEdit NinePatchRect Panel Popup Range ReferenceRect RichTextLabel Separator Tabs TextEdit TextureRect Tree VideoPlayer Button LinkButton TextureButton CheckBox CheckButton ColorPickerButton MenuButton OptionButton ToolButton AspectRatioContainer BoxContainer CenterContainer EditorProperty GraphNode GridContainer MarginContainer PanelContainer ScrollContainer SplitContainer TabContainer ViewportContainer ColorPicker HBoxContainer VBoxContainer EditorResourcePicker EditorScriptPicker FileSystemDock ScriptEditor EditorInspector HSplitContainer VSplitContainer Node2D AnimatedSprite AudioStreamPlayer2D BackBufferCopy Bone2D CPUParticles2D Camera2D CanvasModulate CollisionObject2D  CollisionPolygon2D CollisionShape2D Joint2D Light2D LightOccluder2D Line2D Listener2D MeshInstance2D MultiMeshInstance2D Navigation2D NavigationPolygonInstance ParallaxLayer Particles2D Path2D PathFollow2D Polygon2D Position2D RayCast2D RemoteTransform2D Skeleton2D Sprite TileMap TouchScreenButton VisibilityNotifier2D YSort Area2D PhysicsBody2D KinematicBody2D RigidBody2D StaticBody2D DampedSpringJoint2D GrooveJoint2D PinJoint2D VisibilityEnabler2D ParallaxBackground Spatial ARVRAnchor ARVRController ARVROrigin AudioStreamPlayer3D BoneAttachment Camera CollisionObject CollisionPolygon CollisionShape CullInstance GridMap Joint Listener Navigation NavigationMeshInstance Occluder Path PathFollow Portal Position3D ProximityGroup RayCast RemoteTransform Room RoomGroup RoomManager Skeleton SpringArm VehicleWheel ARVRCamera ClippedCamera InterpolatedCamera Area PhysicsBody KinematicBody PhysicalBone RigidBody StaticBody VehicleBody VisibilityNotifier VisualInstance ConeTwistJoint Generic6DOFJoint HingeJoint PinJoint SliderJoint AESContext ARVRInterface ARVRPositionalTracker AStar AStar2D AnimationTrackEditPlugin AudioEffectInstance AudioStreamPlayback CameraFeed CharFXTransform ConfigFile Crypto DTLSServer Directory EditorExportPlugin EditorFeatureProfile EditorInspectorPlugin EditorResourceConversionPlugin EditorResourcePreviewGenerator EditorSceneImporter EditorScenePostImport EditorScript EncodedObjectAsID Expression File FuncRef GDNative GDScriptFunctionState HMACContext HTTPClient HashingContext JSONParseResult JavaClass JavaScriptObject KinematicCollision KinematicCollision2D MeshDataTool MultiplayerAPI Mutex PCKPacker PackedDataContainerRef PacketPeer Physics2DShapeQueryParameters Physics2DTestMotionResult PhysicsShapeQueryParameters PhysicsTestMotionResult RandomNumberGenerator RegEx RegExMatch Resource ResourceFormatLoader ResourceFormatSaver ResourceImporter ResourceInteractiveLoader SceneState SceneTreeTimer Semaphore SkinReference SpatialGizmo SpatialVelocityTracker StreamPeer SurfaceTool TCP_Server Thread TriangleMesh UDPServer UPNP UPNPDevice VisualScriptFunctionState WeakRef WebRTCPeerConnection XMLParser ARVRInterfaceGDNative MobileVRInterface WebXRInterface AudioStreamPlaybackResampled AudioStreamGeneratorPlayback AudioStreamPlaybackResampled AudioStreamGeneratorPlayback EditorSceneImporterFBX EditorSceneImporterGLTF NetworkedMultiplayerPeer PacketPeerDTLS PacketPeerGDNative PacketPeerStream PacketPeerUDP WebRTCDataChannel WebSocketPeer MultiplayerPeerGDNative NetworkedMultiplayerENet WebRTCMultiplayer WebSocketMultiplayerPeer WebSocketClient WebSocketServer WebRTCDataChannelGDNative Animation AnimationNode AnimationNodeStateMachinePlayback AnimationNodeStateMachineTransition AudioBusLayout AudioEffect AudioStream BakedLightmapData BitMap ButtonGroup CryptoKey CubeMap Curve Curve2D Curve3D DynamicFontData EditorSettings EditorSpatialGizmoPlugin Environment Font GDNativeLibrary GIProbeData GLTFAccessor GLTFAnimation GLTFBufferView GLTFCamera GLTFDocument GLTFLight GLTFMesh GLTFNode GLTFSkeleton GLTFSkin GLTFSpecGloss GLTFState GLTFTexture Gradient Image InputEvent Material Mesh MeshLibrary MultiMesh NavigationMesh NavigationPolygon OccluderPolygon2D OccluderShape OpenSimplexNoise PackedDataContainer PackedScene PhysicsMaterial PolygonPathFinder RichTextEffect Script Shader Shape Shape2D ShortCut Skin Sky SpriteFrames StyleBox TextFile Texture TextureLayered Theme TileSet Translation VideoStream VisualScriptNode VisualShaderNode World World2D X509Certificate AnimationNodeAdd2 AnimationNodeAdd3 AnimationNodeBlend2 AnimationNodeBlend3 AnimationNodeOneShot AnimationNodeOutput AnimationNodeTimeScale AnimationNodeTimeSeek AnimationNodeTransition AnimationRootNode AnimationNodeAnimation AnimationNodeBlendSpace1D AnimationNodeBlendSpace2D AnimationNodeBlendTree AnimationNodeStateMachine AudioEffectAmplify AudioEffectCapture AudioEffectChorus AudioEffectCompressor AudioEffectDelay AudioEffectDistortion AudioEffectEQ AudioEffectFilter AudioEffectLimiter AudioEffectPanner AudioEffectPhaser AudioEffectPitchShift AudioEffectRecord AudioEffectReverb AudioEffectSpectrumAnalyzer AudioEffectStereoEnhance AudioEffectEQ10 AudioEffectEQ21 AudioEffectEQ6 AudioEffectBandLimitFilter AudioEffectBandPassFilter AudioEffectHighPassFilter AudioEffectHighShelfFilter AudioEffectLowPassFilter AudioEffectLowShelfFilter AudioEffectNotchFilter AudioStreamGenerator AudioStreamMP3 AudioStreamMicrophone AudioStreamOGGVorbis AudioStreamRandomPitch AudioStreamSample BitmapFont DynamicFont InputEventAction InputEventJoypadButton InputEventJoypadMotion InputEventMIDI InputEventScreenDrag InputEventScreenTouch InputEventWithModifiers InputEventGesture InputEventKey InputEventMouse InputEventMagnifyGesture InputEventPanGesture InputEventMouseButton InputEventMouseMotion CanvasItemMaterial ParticlesMaterial ShaderMaterial SpatialMaterial ArrayMesh PrimitiveMesh CapsuleMesh CubeMesh CylinderMesh PlaneMesh PointMesh PrismMesh QuadMesh SphereMesh OccluderShapeSphere PackedSceneGLTF GDScript NativeScript PluginScript VisualScript VisualShader BoxShape CapsuleShape ConcavePolygonShape ConvexPolygonShape CylinderShape HeightMapShape PlaneShape RayShape SphereShape CapsuleShape2D CircleShape2D ConcavePolygonShape2D ConvexPolygonShape2D LineShape2D RayShape2D RectangleShape2D SegmentShape2D PanoramaSky ProceduralSky StyleBoxEmpty StyleBoxFlat StyleBoxLine StyleBoxTexture AnimatedTexture AtlasTexture CameraTexture CurveTexture ExternalTexture GradientTexture ImageTexture LargeTexture MeshTexture NoiseTexture ProxyTexture StreamTexture ViewportTexture Texture3D TextureArray PHashTranslation VideoStreamGDNative VideoStreamTheora VideoStreamWebm VisualScriptBasicTypeConstant VisualScriptBuiltinFunc VisualScriptClassConstant VisualScriptComment VisualScriptCondition VisualScriptConstant VisualScriptConstructor VisualScriptCustomNode VisualScriptDeconstruct VisualScriptEmitSignal VisualScriptEngineSingleton VisualScriptExpression VisualScriptFunction VisualScriptFunctionCall VisualScriptGlobalConstant VisualScriptIndexGet VisualScriptIndexSet VisualScriptInputAction VisualScriptIterator VisualScriptLists VisualScriptLocalVar VisualScriptLocalVarSet VisualScriptMathConstant VisualScriptOperator VisualScriptPreload VisualScriptPropertyGet VisualScriptPropertySet VisualScriptResourcePath VisualScriptReturn VisualScriptSceneNode VisualScriptSceneTree VisualScriptSelect VisualScriptSelf VisualScriptSequence VisualScriptSubCall VisualScriptSwitch VisualScriptTypeCast VisualScriptVariableGet VisualScriptVariableSet VisualScriptWhile VisualScriptYield VisualScriptYieldSignal VisualScriptComposeArray VisualShaderNodeExpression VisualShaderNodeGlobalExpression VisualShaderNodeScalarSwitch VisualShaderNodeBooleanUniform VisualShaderNodeColorUniform VisualShaderNodeScalarUniform VisualShaderNodeTextureUniform VisualShaderNodeTransformUniform VisualShaderNodeVec3Uniform VisualShaderNodeCubeMapUniform VisualShaderNodeTextureUniformTriplanar EditorSpatialGizmo StreamPeerBuffer StreamPeerGDNative StreamPeerSSL StreamPeerTCP WebRTCPeerConnectionGDNative",
                            //function_definition: "_enter_tree _exit_tree _get _get_configuration_warning _get_property_list _init _input _notification _physics_process _process _ready _set _to_string _unhandled_input _unhandled_key _draw _clips_input _get_minimum_size _gui_input _make_custom_tooltip",
                        },
                        contains: [
                            e.NUMBER_MODE,
                            e.HASH_COMMENT_MODE,
                            {
                                className: "comment",
                                begin: /"""/,
                                end: /"""/
                            },
                            e.QUOTE_STRING_MODE,
                            {
                                variants: [{
                                        className: "function",
                                        beginKeywords: "func"
                                    },
                                    {
                                        className: "class",
                                        beginKeywords: "class"
                                    }
                                ],

                                end: /\w*(?=[?()]{2,})/,
                                contains: [e.UNDERSCORE_TITLE_MODE]
                            }
                        ]
                    }
                }
                return e.exports = function(e) {
                        e.registerLanguage("gdscript", r)
                    },
                    e.exports.definer = r,
                    e.exports.definer || e.exports

                console.log(e)
            }()
        )

        hljs.highlightAll();
    </script>
</body>

</html>
